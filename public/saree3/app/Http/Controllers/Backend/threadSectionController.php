<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\threadSection;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class threadSectionController extends AbstractController
{
    public function __construct(threadSection $model)
    {
        parent::__construct($model,'threadSection');
//        $this->middleware(['permission:backend']);
    }

    public function index() {
        return $this->view();
    }

    public function datatable() {
        return DataTables::of($this->model->query())
            ->addColumn('title', function($row){
                return '<a href="'.route('backend.threadSection.edit', $row->id).'">'.$row->title[app()->getLocale()].'</a>';
            })
            ->addColumn('body', function($row){
                return str_limit(@$row->body[app()->getLocale()], 10,'...');
            })
            ->rawColumns(['title'])
            ->make(true);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(Request $request)
    {
       // dd(Request()->all());
        $validation = \Validator::make(Request()->all(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());
        
        $this->model->create(Request()->except('image'));
        return redirect()->route('backend.threadSection.index')->with('doneMessage', __('Created Successfully'));
    }

    public function edit($id)
    {
        $this->viewData['data'] = $this->model->find($id);
        return $this->view('edit');
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $this->model->findOrFail($id)->update($request->except('confirm-password','roles'));
        return redirect()->route('backend.threadSection.index')->with('doneMessage', __('Updated Successfully'));
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
