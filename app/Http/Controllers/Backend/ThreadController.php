<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Thread;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ThreadController extends AbstractController
{
    public function __construct(Thread $model)
    {
        parent::__construct($model,'threads');
//        $this->middleware(['permission:backend']);
    }

    public function index()
    {
        return $this->view();
    }

    public function datatable()
    {
        return DataTables::of($this->model->query())
            ->addColumn('title', function($row){
                return '<a href="'.route('backend.threads.edit', $row->id).'">'.$row->title.'</a>';
            })
            ->addColumn('user_id', function($row){
                return $row->user->name;
            })
            ->addColumn('section_id', function($row){
                return @$row->section->title[app()->getLocale()];
            })
            ->addColumn('body', function($row){
                return strip_tags(str_limit(@$row->body, 10,'...'));
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
        $validation = \Validator::make($request->input(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $this->model->create($request->except('files'));
        return redirect()->route('backend.threads.index')->with('doneMessage', __('Created Successfully'));
    }

    public function edit($id)
    {
        $this->viewData['data'] = $this->model->find($id);
        return $this->view('edit');
    }

    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->input(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $this->model->findOrFail($id)->update($request->except('files'));
        return redirect()->route('backend.threads.index')->with('doneMessage', __('Updated Successfully'));
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
