<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserController extends AbstractController
{
    public function __construct(User $model)
    {
        parent::__construct($model,'users');
        $this->middleware(['permission:backend']);
    }

    public function index()
    {
        return $this->view();
    }

    public function datatable()
    {
        return DataTables::of($this->model->query())
            ->addColumn('name', function($row){
                return '<a href="'.route('backend.users.edit', $row->id).'">'.$row->name.'</a>';
            })
            ->rawColumns(['name'])
            ->make(true);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(Request $request)
    {
    	// create new user
        $validation = \Validator::make($request->input(), $this->model->rules($request->method()));
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());
        $this->model->create($request->all());
        return redirect()->route('backend.users.index')->with('doneMessage', __('Created Successfully'));
    }

    public function edit($id)
    {
        $this->viewData['data'] = $this->model->find($id);
        return $this->view('edit');
    }

    public function update(Request $request, $id) {
        $validation = \Validator::make($request->input(), $this->model->rules($request->method(), $id));
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());
        $input = $request->all();
        if(empty($input['password'])){
            $input = array_except($input,array('password'));
        }

        $this->model->findOrFail($id)->update($input);
        DB::table('users')
            ->where('id', $id)
            ->update(['upload_products' => Request()->upload_products]);

        return redirect()->route('backend.users.index')->with('doneMessage', __('Updated Successfully'));
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
