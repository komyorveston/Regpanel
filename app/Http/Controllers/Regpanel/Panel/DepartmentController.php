<?php

namespace App\Http\Controllers\Regpanel\Panel;

use App\Repositories\Regpanel\DepartmentRepository;
use Illuminate\Http\Request;
use App\Http\Requests\PanelDepartmentRequest;
use App\Http\Controllers\Controller;
use App\Models\Regpanel\Stuff;
use App\Models\Regpanel\Organization;
use App\Models\Regpanel\Department;
use App\Models\Regpanel\Position;
use App\Setups\Core\SetupsApp;
use MetaTag;

class DepartmentController extends PanelBaseController
{
    private $departmentRepository;

    public function __construct()
    {
        parent::__construct();
        $this->departmentRepository = app(DepartmentRepository::class);
    }

    public function index()
    {
        $arrMenu = Department::all();
        $menu = $this->departmentRepository->buildMenu($arrMenu);
        MetaTag::setTags(['title' => 'Список категорий']);
        return view('regpanel.panel.department.index', ['menu' => $menu]);
    }

    public function create()
    {
        $item = new Department();
        $departmentList = $this->departmentRepository->getComboBosDepartment();

        MetaTag::setTags(['title' => 'Создание нового отдела']);
        return view('regpanel.panel.department.create',[
            'departments' => Department::with('children')
                    ->where('parent_id', '0')
                    ->get(),
            'delimiter' => '-',
            'item' => $item,
            'organizations' => Organization::get(),
        ]);
    }
 
    public function store(PanelDepartmentRequest $request)
    {
        $name = $this->departmentRepository->checkUniqueName($request->title, $request->parent_id);
        if($name){
            return back()
                ->withErrors(['msg' => 'Не может быть в одного и того же Отдела двух одинаковых. Выберите другой Отдел.'])
                ->withInput();
        }

        $data = $request->input();
        $data['created_user'] = $request->user()->id;
        $item = new Department();
        $item->organization_id = $request->org_id;
        $item->fill($data)->save();
        if ($item) {
            return redirect()
                ->route('regpanel.panel.departments.create',[$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function edit($id, DepartmentRepository $departmentRepository)
    {
        $item = $this->departmentRepository->getId($id);
        if (empty($item)){
            abort(404);
        }

        MetaTag::setTags(['title' => "Редактирование отдела № $id"]);
        return view('regpanel.panel.department.edit',[
            'departments' => Department::with('children')
                ->where('parent_id', '0')
                ->get(),
            'delimiter' => '-',
            'item' => $item,
            'organizations' => Organization::get(),
        ]);
    }

    public function update(PanelDepartmentRequest $request, $id)
    {
        $item = $this->departmentRepository->getId($id);
        if (empty($item)){
            return back()
                ->withErrors(['msg' => "Запись = [{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $item->organization_id = $request->organization_id;
        $result = $item->update($data);
        if ($result) {
            return redirect()
                ->route('regpanel.panel.departments.edit', $item->id)
                ->with(['success' => "Успешно сохранено"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения!'])
                ->withInput();
        }
    }

    public function mydel()
    {
        $id = $this->departmentRepository->getRequestID();
        if (!$id){
            return back()->withErrors(['msg' => 'Ошибка с ID']);
        }

        $children = $this->departmentRepository->checkChildren($id);
        if ($children) {
            return back()->withErrors(['msg' => 'Удаление невозможно, в категории есть вложенные отделы']);
        }

        $parents = $this->departmentRepository->checkParentsStuffs($id);
        if ($parents) {
            return back()->withErrors(['msg' => 'Удаление невозможно, в категории есть сотрудники']);
        }

        $delete = $this->departmentRepository->deleteDepartment($id);
        if ($delete) {
            return redirect()
                ->route('regpanel.panel.departments.index')
                ->with(['success' => "Запись id [$id] удалена"]);
        } else {
            return back()->withErrors(['img' => 'Ошибка удаления']);
        }
    }


}
