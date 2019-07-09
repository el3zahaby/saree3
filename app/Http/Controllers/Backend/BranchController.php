<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BranchController extends AbstractController
{
    public function __construct(Branch $model)
    {
        parent::__construct($model,'branches');
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
                return '<a href="'.route('backend.branches.edit', $row->id).'">'.$row->name.'</a>';
            })
            ->rawColumns(['name'])
            ->make(true);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(Request $request) {

      // dd(Request()->all());
        $validation = \Validator::make($request->all(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $this->model->create($request->except('confirm-password', 'body','roles','files','phone' , 'image', 'section_id'));


        $branche_image = Request('image');
        $branchetImageName = time().'.'.$branche_image->getClientOriginalExtension();
        $branche_image->move(public_path('images/branches'), $branchetImageName);
//        DB::table('branches')
//            ->where([['name',Request()->name]])
//            ->update([
//                "image" => $branchetImageName,
//                "updated_at" => \Carbon\Carbon::now(),
//            ]);

        return redirect()->route('backend.branches.index')->with('doneMessage', __('Created Successfully'));
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
        return redirect()->route('backend.branches.index')->with('doneMessage', __('Updated Successfully'));
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
