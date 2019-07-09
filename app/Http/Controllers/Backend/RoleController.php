<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoleController extends AbstractController
{
    public function __construct(Role $model)
    {
        parent::__construct($model,'roles');
//        $this->middleware(['permission:backend']);
    }

    public function index()
    {
        return $this->view();
    }

    public function datatable()
    {
        return DataTables::of($this->model->query())
            ->addColumn('name', function($row){
                return '<a href="'.route('backend.roles.edit', $row->id).'">'.$row->name.'</a>';
            })
            ->rawColumns(['name'])
            ->make(true);
    }

    public function create()
    {
        $this->viewData['permissions'] = Permission::get();
        return $this->view('create');
    }

    public function store(Request $request)
    {
		$validation = \Validator::make($request->all(), [
			'name'        => 'required|unique:roles,name|max:150',
			'permissions' => 'required',
			'permissions.*' => 'required|exists:permissions,id'
		]);

//		return 'Hi';

		if($validation->fails())
			return redirect()->back()->withInput()->withErrors($validation->messages());

		$role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));
        return redirect()->route('backend.roles.index')->with('doneMessage', __('Created Successfully'));
    }

    public function edit($id)
    {
        $role = $this->model->find($id);
        $this->viewData['data'] = $role;
        $this->viewData['permissions'] = Permission::get();
        $this->viewData['role_permissions'] = $role->permissions->pluck('name', 'name')->all();
//        dd($this->viewData);
        return $this->view('edit');
    }

    public function update(Request $request, $id)
    {
        $role = $this->model->find($id);
        $role->name = $request->input('name');
//        dd($request->all());
        $role->save();
        $role->syncPermissions($request->input('permissions'));
        return redirect()->route('backend.roles.index')->with('doneMessage', __('Updated Successfully'));
    }

    public function UpdateAll(Request $request)
    {
        if ($request->ids) {
            if ($request->action == "delete") {
                $this->model->wherein('id', array_keys($request->ids))
                    ->delete();
            }
            return redirect()->back()->with('doneMessage', __('Done Successfully'));
        }else{
            return redirect()->back()->with('errorMessage', __('Nothing Selected'));
        }
    }
}
