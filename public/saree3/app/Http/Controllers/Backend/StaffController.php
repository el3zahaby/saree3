<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Staff;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class StaffController extends AbstractController
{
    public function __construct(Staff $model)
    {
        parent::__construct($model,'staff');
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
                return '<a href="'.route('backend.staff.edit', $row->id).'">'.$row->name.'</a>';
            })
            ->rawColumns(['name'])
            ->make(true);
    }

    public function create()
    {
        $this->viewData['role'] = 'Choose';
        $this->viewData['roles'] = Role::pluck('name', 'id')->all();
        return $this->view('create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'     => 'required|max:150',
            'email'    => 'required|email|max:190|unique:staff,email',
			'username' => 'required|max:150|unique:staff,username',
			'password' => 'required|min:6|max:190|same:confirm-password',
            'roles'    => 'required|exists:roles,id'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        $input = $request->all();
        $staff = $this->model->create($input);
        $staff->assignRole($request->input('roles'));

        return redirect()->route('backend.staff.index')->with('doneMessage', __('Created Successfully'));
    }

    public function edit($id)
    {
        $this->viewData['data'] = $this->model->find($id);
        $this->viewData['roles'] = Role::pluck('name', 'name')->all();
        $this->viewData['role'] = $this->model->find($id)->getRoleNames();
        return $this->view('edit');
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email|unique:staff,email,' . $id,
            'password' => 'same:confirm-password',
            'roles'    => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        $input = $request->all();
        if(empty($input['password'])){
            $input = array_except($input,array('password'));
        }
        $staff = $this->model->find($id);
        $staff->update($input);
        $staff->syncRoles($request->input('roles'));
        return redirect()->back()->with('doneMessage', __('Updated Successfully'));
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
