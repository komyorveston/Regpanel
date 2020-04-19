<?php

namespace App\Http\Controllers\Regpanel\Panel;

use App\Repositories\Regpanel\StuffRepository;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Regpanel\Panel;
use Illuminate\Http\Request;
use App\Http\Requests\PanelStuffRequest;
use App\Models\Regpanel\Stuff;
use App\Models\Regpanel\Organization;
use App\Models\Regpanel\Department;
use App\Models\Regpanel\Position;
use App\Setups\Core\SetupsApp;
use MetaTag;
 
class StuffController extends PanelBaseController
{
    private $stuffRepository;

    public function __construct()
    {
        parent::__construct();
        $this->stuffRepository = app(StuffRepository::class);
    }


    public function index()
    {
        $perpage = 10;
        $getAllStuffs = $this->stuffRepository->getAllStuffs($perpage);
        $count = $this->stuffRepository->getCountStuffs();

        MetaTag::setTags(['title' => 'Список сотрудников']);
        return view('regpanel.panel.stuff.index', compact('getAllStuffs', 'count'));
    }


    public function create()
    {
        $item = new Department();
        MetaTag::setTags(['title' => "Создание нового сотрудника"]);
        return view('regpanel.panel.stuff.create', [
            'positions' => Position::get(),
            'organizations' => Organization::get(),
            'departments' => Department::with('children')
                            ->where('parent_id', '0')
                            ->get(),
            'delimiter' => '-',
            'item' => $item,
        ]);
    }
 
    public function store(PanelStuffRequest $request)
    {
        $data = $request->input();
        $data['created_user'] = $request->user()->id;
        $stuff = (new Stuff())->create($data);
        $stuff->department_id = $request->department_id ?? '0';
        $stuff->organization_id = $request->organization_id ?? '0';
        $stuff->position_id = $request->position_id ?? '0';
        $this->stuffRepository->getImg($stuff);
        $save = $stuff->save();
        if ($save) {
          return redirect()
            ->route('regpanel.panel.stuffs.create', [$stuff->id])
            ->with(['success' => 'Успешно сохранено']);
        } else {
          return back()
            ->withErrors(['msg' => 'Ошибка сохранения'])
            ->withInput();
        }
    }
 
    public function edit($id)
    {
        $item = $this->stuffRepository->getInfoStuff($id);
        $id = $item->id;
        SetupsApp::get_instance()->setProperty('parent_id', $item->department_id);
        //$organization = $this->stuffRepository->getOrganization($id);
        //$position = $this->stuffRepository->getPosition($id);
        MetaTag::setTags(['title' => "Редактирование сотрудника № $id"]);
        return view('regpanel.panel.stuff.edit', compact('item', 'id'), [
            'departments' => Department::with('children')
                ->where('parent_id', '0')
                ->get(),
            'delimiter' => '-',
            'item' => $item,
            'organization' => Organization::get(),
            'position' => Position::get(),
        ]);
    }

    public function update(PanelStuffRequest $request, $id)
    {
        $item = $this->stuffRepository->getId($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись = [{$id}] не найдена"])
                ->withInput();
        }
        $data = $request->all();
        $result = $item->update($data);
        $item->organization_id = $request->organization_id;
        $item->position_id = $request->position_id;
        $item->department_id = $request->parent_id ?? $item->department_id;
        $this->stuffRepository->getImg($item);
        $save = $item->save();
        if ($result && $save){
            return redirect()
                ->route('regpanel.panel.stuffs.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /*AjaxUpload Single Image*/
    public function ajaxImage(Request $request){
        if ($request->isMethod('get')){
            return view('regpanel.panel.stuff.include.image_single_edit');
        } else {
            $validator = \Validator::make($request->all(),
                [
                    'file' => 'image|max:5000',
                ],
                [
                    'file.image' => 'Файл должен быть картинкой (jpeg, png, gif, or svg)',
                    'file.max' => 'Ошибка! Максимальный размер картинки -5 мб',
                ]);
            if ($validator->fails()){
                return array (
                    'fail' => true,
                    'errors' => $validator->errors()
                );
            }

            $extension = $request->file('file')->getClientOriginalExtension();
            $dir = 'uploads/single/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $request->file('file')->move($dir, $filename);
            $wmax = BlogApp::get_instance()->getProperty('img_width');
            $hmax = BlogApp::get_instance()->getProperty('img_height');
            $this->stuffRepository->uploadImg($filename, $wmax, $hmax);
            return $filename;
        }
    }

    /*Delete Single Image*/
    public function deleteImage($filename){
        \File::delete('uploads/single/' . $filename);
    }

    /**Return product status status = 1*/
    public function returnStatus($id){
        if ($id) {
            $st = $this->stuffRepository->returnStatus($id);
            if ($st) {
                return redirect()
                    ->route('regpanel.panel.stuffs.index')
                    ->with(['success' => 'Успешно сохранено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка сохранения'])
                    ->withInput();
            }
        }
    }

    /** Return product status = 0 */
    public function deleteStatus($id){
        if ($id) {
            $st = $this->stuffRepository->deleteStatusOne($id);
            if ($st) {
                return redirect()
                    ->route('regpanel.panel.stuffs.index')
                    ->with(['success' => 'Успешно сохранено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка сохранения'])
                    ->withInput();
            }
        }
    }

    /** Delete One Product fro DB*/
    public function deleteStuff($id){
         if ($id){
            $db = $this->stuffRepository->deleteFromDB($id);

            if ($db) {
                return redirect()
                    ->route('regpanel.panel.stuffs.index')
                    ->with(['success' => 'Успешно удалено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка удаления'])
                    ->withInput();
            }
        }
    }

}
