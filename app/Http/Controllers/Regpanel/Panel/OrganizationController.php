<?php

namespace App\Http\Controllers\Regpanel\Panel;

use App\Repositories\Regpanel\OrganizationRepository;
use Illuminate\Http\Request;
use App\Http\Requests\PanelOrganizationRequest;
use App\Http\Controllers\Controller;
use App\Models\Regpanel\Stuff;
use App\Models\Regpanel\Organization;
use App\Models\Regpanel\Department;
use App\Models\Regpanel\Position;
use App\Setups\Core\SetupsApp;
use MetaTag;
use Auth;



class OrganizationController extends PanelBaseController
{
    private $organizationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->organizationRepository = app(OrganizationRepository::class);
    }
 

    public function index()
    {
        $perpage = 10;
        $getAllOrganizations = $this->organizationRepository->getAllOrganizations($perpage);
        $count = $this->organizationRepository->getCountOrganizations();
        
        MetaTag::setTags(['title' => 'Список продуктов']);
        return view('regpanel.panel.organization.index', compact('getAllOrganizations', 'count'));
    }


    public function create()
    {
        $item = new Organization();
        MetaTag::setTags(['title' => "Создание новой организации"]);
        return view('regpanel.panel.organization.create', [
            'item' => $item,
        ]);
    }


    public function store(PanelOrganizationRequest $request)
    {
        $data = $request->input();
        $data['created_user'] = $request->user()->id;
        $organization = (new Organization())->create($data);
        $this->organizationRepository->getImg($organization);
        $save = $organization->save();
        if ($save) {
          return redirect()
            ->route('regpanel.panel.organizations.create', [$organization->id])
            ->with(['success' => 'Успешно сохранено']);
        } else {
          return back()
            ->withErrors(['msg' => 'Ошибка сохранения'])
            ->withInput();
        }
    }

    public function edit($id)
    {
        $organization = $this->organizationRepository->getInfoOrganization($id);
        $id = $organization->id;
        /**Department selection*/
        $arrMenu = Department::all();
        $menu = $this->organizationRepository->buildMenu($arrMenu);
        /**Stuff selection*/
        $getAllStuffs = $this->organizationRepository->getAllStuffs(10);
        $countstuffs = $this->organizationRepository->getCountStuffs();
        MetaTag::setTags(['title' => "Редактирование сервиса № $id"]);
        return view('regpanel.panel.organization.edit', compact('organization', 'id', 'menu','getAllStuffs', 'countstuffs'));
    }


    public function update(PanelOrganizationRequest $request, $id)
    {
        $organization = $this->organizationRepository->getId($id);
        if (empty($organization)) {
            return back()
                ->withErrors(['msg' => "Запись = [{$id}] не найдена"])
                ->withInput();
        }
        $data = $request->all();
        $result = $organization->update($data);
        $this->organizationRepository->getImg($organization);
        $save = $organization->save();
        if ($result && $save){
            return redirect()
                ->route('regpanel.panel.organizations.edit', [$organization->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /*Single Image AjaxUpload*/
    public function ajaxImage(Request $request){
        if ($request->isMethod('get')){
            return view('regpanel.panel.organization.include.image_single_edit');
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
            $this->organizationRepository->uploadImg($filename, $wmax, $hmax);
            return $filename;
        }
    }


    /*Delete Single Image*/
    public function deleteImage($filename){
        \File::delete('uploads/single/' . $filename);
    }

    /**Return organization status status = 1*/
    public function returnStatus($id){
        if ($id) {
            $st = $this->organizationRepository->returnStatus($id);
            if ($st) {
                return redirect()
                    ->route('regpanel.panel.organizations.index')
                    ->with(['success' => 'Успешно сохранено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка сохранения'])
                    ->withInput();
            }
        }
    }

    /** Return organization status = 0 */
    public function deleteStatus($id){
        if ($id) {
            $st = $this->organizationRepository->deleteStatusOne($id);
            if ($st) {
                return redirect()
                    ->route('regpanel.panel.organizations.index')
                    ->with(['success' => 'Успешно сохранено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка сохранения'])
                    ->withInput();
            }
        }
    }

    /** Delete One Organization from DB*/
    public function deleteOrganization($id){
         if ($id){
            $db = $this->organizationRepository->deleteFromDB($id);

            if ($db) {
                return redirect()
                    ->route('regpanel.panel.organizations.index')
                    ->with(['success' => 'Успешно удалено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка удаления'])
                    ->withInput();
            }
        }
    }

    /**Remove Department*/
    public function mydel()
    {
        $id = $this->organizationRepository->getRequestID();
        if (!$id){
            return back()->withErrors(['msg' => 'Ошибка с ID']);
        }

        $children = $this->organizationRepository->checkChildren($id);
        if ($children) {
            return back()->withErrors(['msg' => 'Удаление невозможно, в категории есть вложенные отделы']);
        }

        $parents = $this->organizationRepository->checkParentsStuffs($id);
        if ($parents) {
            return back()->withErrors(['msg' => 'Удаление невозможно, в категории есть сотрудники']);
        }

        $delete = $this->organizationRepository->deleteDepartment($id);
        if ($delete) {
            return redirect()
                ->route('regpanel.panel.organizations.index')
                ->with(['success' => "Запись id [$id] удалена"]);
        } else {
            return back()->withErrors(['img' => 'Ошибка удаления']);
        }
    }

    /**Remove Stuff*/
    public function deleteStuff($id){
         if ($id){
            $db = $this->organizationRepository->deleteFromDBStuff($id);

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
