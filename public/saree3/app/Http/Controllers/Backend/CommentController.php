<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Comment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CommentController extends AbstractController
{
    public function __construct(Comment $model)
    {
        parent::__construct($model,'comments');
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
                return '<a href="'.route('backend.comments.edit', $row->id).'">'.$row->name.'</a>';
            })
            ->addColumn('commentable_type', function($row){
                return $row->commentable_type;
            })
            ->addColumn('user_id', function($row){
                return $row->user_id;
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
        $validation = \Validator::make($request->input(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $this->model->create($request->except('confirm-password','roles'));
        return redirect()->route('backend.comments.index')->with('doneMessage', __('Created Successfully'));
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
        return redirect()->route('backend.comments.index')->with('doneMessage', __('Updated Successfully'));
    }

    public function UpdateAll(Request $request)
    {
        if ($request->ids) {
            if ($request->action == "activate") {
                $this->model->wherein('id', array_keys($request->ids))
                    ->update(['status' => 1]);
            } elseif ($request->action == "block") {
                $this->model->wherein('id', array_keys($request->ids))
                    ->update(['status' => 0]);
            } elseif ($request->action == "delete") {
                $this->model->wherein('id', array_keys($request->ids))
                    ->delete();
            }
            return redirect()->back()->with('doneMessage', __('Done Successfully'));
        }else{
            return redirect()->back()->with('errorMessage', __('Nothing Selected'));
        }
    }
}
