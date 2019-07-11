<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AttachmentController extends AbstractController
{
    public function __construct(Attachment $model)
    {
        parent::__construct($model,'attachments');
        $this->middleware(['permission:staff']);
    }

    public function index()
    {
        return $this->view();
    }

    public function datatable()
    {
        return DataTables::of($this->model->query())
            ->addColumn('name', function($row){
                return '<a href="'.url('backend/attachments', $row->path).'">'.$row->name.'</a>';
            })
            ->addColumn('attachable_type', function($row){
                return $row->attachable_type;
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
        $this->model->create($request->except('confirm-password','roles'));
        return redirect()->route('backend.attachments.index')->with('doneMessage', __('Created Successfully'));
    }

    public function edit($id)
    {
        $this->viewData['data'] = $this->model->find($id);
        return $this->view('edit');
    }

    public function update(Request $request, $id)
    {
        $this->model->findOrFail($id)->update($request->except('confirm-password','roles'));
        return redirect()->route('backend.attachments.index')->with('doneMessage', __('Updated Successfully'));
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
