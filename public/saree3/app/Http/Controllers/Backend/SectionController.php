<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Section;
use Illuminate\Http\Request;
use PHPUnit\Util\RegularExpressionTest;
use Yajra\DataTables\DataTables;

class SectionController extends AbstractController
{
    public function __construct(Section $model)
    {
        parent::__construct($model,'sections');
//        $this->middleware(['permission:backend']);
    }

    public function index() {
        return $this->view();
    }

    public function datatable() {
        return DataTables::of($this->model->query())
            ->addColumn('title', function($row){
                return '<a href="'.route('backend.sections.edit', $row->id).'">'.$row->title[app()->getLocale()].'</a>';
            })
            ->addColumn('order', function($row){
                return @$row->parent->order .'.'. $row->order;
            })
            ->addColumn('parent_id', function($row){
                return @$row->parent->title[app()->getLocale()];
            })
            ->addColumn('description', function($row){
                return str_limit(@$row->description[app()->getLocale()], 10,'...');
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

        $this->model->create($request->all());
        return redirect()->route('backend.sections.index')->with('doneMessage', __('Created Successfully'));
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

        $this->model->findOrFail($id)->update($request->except('confirm-password','roles'));
        return redirect()->route('backend.sections.index')->with('doneMessage', __('Updated Successfully'));
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
