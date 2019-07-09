<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class SliderController extends AbstractController
{
    public function __construct(Slider $model)
    {
        parent::__construct($model,'sliders');
//        $this->middleware(['permission:backend']);
    }

    public function index()
    {  // dd($this->view());
        //dd($this->model);
        return $this->view();
    }

    public function datatable()
    {
        
        return DataTables::of($this->model->query())
            
            ->addColumn('title', function($row){
                return '<a href="'.route('backend.sliders.edit', $row->id).'">'.$row->title.'</a>';
            })
            ->rawColumns(['title'])
            ->make(true);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(Request $request) {
       // dd(Request()->except('confirm-password','roles','images'));

        $validation = \Validator::make($request->all(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $this->model->create(Request()->except('confirm-password','roles','images'));

         /*
            This Code For Inserts Attachments Images Files 
        */
        $attach = Request()->images;
        $extension = $attach->getClientOriginalExtension();
        $path = "slider_image".time().rand(25,1500).".".$extension;
        /* insert attachments in column sliders.image */
        DB::table('sliders')
        ->where('title', Request()->title)
        ->update(['images'  => $path]);
        $file = $attach->move(public_path('uploads/sliders'),$path);

        return redirect()->route('backend.sliders.index')->with('doneMessage', __('Created Successfully'));
    }

    public function edit($id) {
        $this->viewData['data'] = $this->model->find($id);
        return $this->view('edit');
    }

    public function update(Request $request, $id) {

        $validation = \Validator::make($request->all(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $this->model->findOrFail($id)->update($request->except('confirm-password','roles'));
         /*
            This Code For Inserts Attachments Images Files 
        */
        $attach = Request()->images;
        $extension = $attach->getClientOriginalExtension();
        $path = "slider_image".time().rand(25,1500).".".$extension;
        /* insert attachments in column sliders.image */
        DB::table('sliders')
        ->where('title', Request()->title)
        ->update(['images'  => $path]);
        $file = $attach->move(public_path('uploads/sliders'),$path);
        return redirect()->route('backend.sliders.index')->with('doneMessage', __('Updated Successfully'));
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
