<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;


class ProductController extends AbstractController {

    public function __construct(Product $model)
    {
        parent::__construct($model,'products');
       // $this->middleware(['permission:staff']);
    }

    public function index()
    {
        return $this->view();
    }

    public function datatable()
    {
        return DataTables::of($this->model->query())
            ->addColumn('name', function($row){
                return '<a href="'.route('backend.products.edit', $row->id).'">'.$row->name_and_type.'</a>';
            })
            ->addColumn('user_id', function($row){
                return @$row->user->name;
            })
            ->addColumn('section_id', function($row){
                return @$row->section->title[app()->getLocale()];
            })
            ->addColumn('body', function($row){
                return strip_tags(str_limit(@$row->body, 10,'...'));
            })

            ->rawColumns(['name'])
            ->make(true);
    }

    public function create() {
        return $this->view('create');
    }

    public function store(Request $request) {

        $validation = \Validator::make($request->input(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $this->model->create(Request()->except('m','w','attachments'));            
         /*
            This Code For Inserts Attachments Images Files 
        */
        $attach = Request()->attachments;
        $c = 1;
        foreach ($attach as $key => $value):
            $extension = $value->getClientOriginalExtension();
            $path = "product_attachment".time().rand(25,1500).".".$extension;
            $json [] = ['img' => $path ];
            $attachment_images = json_encode($json);

            /* insert attachments in column products.attachments  [json] */
            DB::table('products')
            ->where('name_and_type', Request()->name_and_type)
            ->update(['attachments'  => $attachment_images]);

            $file = $value->move(public_path('uploads/products'),$path);

            $c += 1;  
        endforeach;

        return redirect()->route('backend.products.index')->with('doneMessage', __('Created Successfully'));
    }

    public function edit($id) {
        $this->viewData['data'] = $this->model->find($id);
        return $this->view('edit');
    }

    public function update(Request $request, $id) {

        $validation = \Validator::make($request->input(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

            if(is_null(Request()->m) && is_null(Request()->w) ) {
                $this->model->findOrFail($id)->update($request->except('files','m','w'));
            }else {
                $this->model->findOrFail($id)->update($request->except('files','m','w'));
            }

        return redirect()->route('backend.products.index')->with('doneMessage', __('Updated Successfully'));
    }

    public function UpdateAll(Request $request) {

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
