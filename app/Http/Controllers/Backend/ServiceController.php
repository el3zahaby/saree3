<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ServiceController extends AbstractController
{
    public function __construct(Service $model)
    {
        parent::__construct($model,'services');
        $this->middleware(['permission:backend']);
    }

    public function index()
    {
        return $this->view();
    }

    public function datatable ()
    {
        return DataTables::of($this->model->query())
            ->addColumn('name', function($row){
                return '<a href="'.route('backend.services.edit', $row->id).'">'.$row->name.'</a>';
            })
            ->addColumn('user_id', function($row){
                return $row->user->name;
            })
            ->addColumn('section_id', function($row){
                return @$row->section->title[app()->getLocale()];
            })
            ->addColumn('area_id', function($row){
                return @$row->area->name;
            })
            ->addColumn('body', function($row){
                return @$row->area->name;
            })
            ->addColumn('price', function($row){
                return @$row->area->name;
            })
            ->addColumn('per', function($row){
                return @$row->area->name;
            })
            ->addColumn('status', function($row){
                return @$row->area->name;
            })
            ->addColumn('created_at', function($row){
                return @$row->area->name;
            })
            ->rawColumns(['name'])
            ->make(true);
    }

    public function create()
    {
        return $this->view('create');
    }

    public function store(Request $request) {

		$validation = \Validator::make($request->all(), $this->model->rules);
		if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $service_image = Request('attachment');
        $serviceImageName = time().'.'.$service_image->getClientOriginalExtension();
        $service_image->move(public_path('images/products'), $serviceImageName);
        $image_db = 'images/products/' . $serviceImageName;
        $arr = [
            'user_id' => Request('user_id'),
            'name' => Request('name'),
            'slug' => Request('name'),
            'section_id' => Request('section_id'),
            'area_id' => Request('area_id'),
            'body' => Request('body'),
            'price' => Request('price'),
            'per' => Request('per'),
            'status' => Request('status'),
            'lat' => Request('lat'),
            'lng' => Request('lng'),
            'attachment' => ['img' => $image_db]
        ];

        $this->model->create($arr);
        return redirect()->route('backend.services.index')->with('doneMessage', __('Created Successfully'));
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


		$service_image = Request('attachment');
		$serviceImageName = time().'.'.$service_image->getClientOriginalExtension();
		$service_image->move(public_path('images/products'), $serviceImageName);
		$image_db = 'images/products/' . $serviceImageName;
		$arr = [
			'user_id' => Request('user_id'),
			'name' => Request('name'),
			'slug' => Request('name'),
			'section_id' => Request('section_id'),
			'area_id' => Request('area_id'),
			'body' => Request('body'),
			'price' => Request('price'),
			'per' => Request('per'),
			'status' => Request('status'),
			'lat' => Request('lat'),
			'lng' => Request('lng'),
			'attachment' => ['img' => $image_db]
		];

		$item = $this->model->find($id);
		$item->update($arr);

        return redirect()->route('backend.services.index')->with('doneMessage', __('Updated Successfully'));
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
