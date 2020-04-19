<?php

namespace App\Http\Controllers\Regpanel\Panel;

use App\Repositories\Regpanel\PositionRepository;
use Illuminate\Http\Request;
use App\Http\Requests\PanelPositionRequest;
use App\Http\Controllers\Controller;
use App\Models\Regpanel\Stuff;
use App\Models\Regpanel\Organization;
use App\Models\Regpanel\Department;
use App\Models\Regpanel\Position;
use App\Setups\Core\SetupsApp;
use MetaTag;
use Auth;

class PositionController extends PanelBaseController
{
	private $positionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->positionRepository = app(PositionRepository::class);
    }


    public function index()
    {
        $perpage = 10;
        $getAllPositions = $this->positionRepository->getAllPositions($perpage);
        $count = $this->positionRepository->getCountPositions();

        MetaTag::setTags(['title' => 'Список должностей']);
        return view('regpanel.panel.position.index', compact('getAllPositions', 'count'));
    }




    public function create()
    {
        $item = new Position();
        MetaTag::setTags(['title' => "Создание новой должности"]);
        return view('regpanel.panel.position.create', [
            'item' => $item,
        ]);
    }

    public function store(PanelPositionRequest $request)
    {
        $data = $request->input();
        $data['created_user'] = $request->user()->id;
        $position = (new Position())->create($data);
        $id = $position->id;
        $save = $position->save();
        if ($save) {
          return redirect()
            ->route('regpanel.panel.positions.create', [$position->id])
            ->with(['success' => 'Успешно сохранено']);
        } else {
          return back()
            ->withErrors(['msg' => 'Ошибка сохранения'])
            ->withInput();
        }
    }

    public function edit($id)
    {
        $position = $this->positionRepository->getInfoPosition($id);
        $id = $position->id;

        MetaTag::setTags(['title' => "Редактирование позиции № $id"]);
        return view('regpanel.panel.position.edit', compact('position', 'id',));
    }

    public function update(PanelPositionRequest $request, $id)
    {
        $position = $this->positionRepository->getId($id);
        if (empty($position)) {
            return back()
                ->withErrors(['msg' => "Запись = [{$id}] не найдена"])
                ->withInput();
        }
        $data = $request->all();
        $result = $position->update($data);
        $save = $position->save();
        if ($result && $save){
            return redirect()
                ->route('regpanel.panel.positions.edit', [$position->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**Return position status status = 1*/
    public function returnStatus($id){
        if ($id) {
            $st = $this->positionRepository->returnStatus($id);
            if ($st) {
                return redirect()
                    ->route('regpanel.panel.positions.index')
                    ->with(['success' => 'Успешно сохранено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка сохранения'])
                    ->withInput();
            }
        }
    }

    /** Return position status = 0 */
    public function deleteStatus($id){
        if ($id) {
            $st = $this->positionRepository->deleteStatusOne($id);
            if ($st) {
                return redirect()
                    ->route('regpanel.panel.positions.index')
                    ->with(['success' => 'Успешно сохранено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка сохранения'])
                    ->withInput();
            }
        }
    }

    /** Delete One Position from DB*/
    public function deletePosition($id){
         if ($id){
            $db = $this->positionRepository->deleteFromDB($id);

            if ($db) {
                return redirect()
                    ->route('regpanel.panel.positions.index')
                    ->with(['success' => 'Успешно удалено']);
            } else {
                return back()
                    ->withErrors(['msg' => 'Ошибка удаления'])
                    ->withInput();
            }
        }
    }

}
