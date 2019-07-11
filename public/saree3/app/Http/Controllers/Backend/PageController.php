<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PageController extends AbstractController
{
    public function __construct(Page $model)
    {
        parent::__construct($model,'pages');
        $this->middleware(['permission:staff']);
    }

    public function index()
    {
        return $this->view();
    }

    public function datatable()
    {
        return $e = DataTables::of($this->model->query())
            ->addColumn('title', function($row){
                return '<a href="'.route('backend.pages.edit', $row->id).'">'.$row->title[app()->getLocale()].'</a>';
            })
            ->rawColumns(['title'])
            ->make(true);

    }

    public function create()
    {
        return $this->view('create');
    }

    /**
	 * this function used for create new page
	 * @version 1.5
	 * @update Abderrazzak oxa

	 */
    public function store(Request $request) {

    	// validation the request
        $validation = \Validator::make($request->all(), $this->model->rules);

        // display errors if is there exist
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());
        	$this->model->create(Request()->except('cover'));

        // prepare the image path
        $attach = Request()->cover;
        $extension = $attach->getClientOriginalExtension();
        $path = "page_attachment".time().rand(25,1500).".".$extension;

        // insert attachments in column products.attachments  [json]
        DB::table('pages')
            ->where('slug', Request()->slug)
            ->update(['cover'  => $path]);

        // upload image
        $attach->move(public_path('uploads/pages'),$path);


        return redirect()->route('backend.pages.index')->with('doneMessage', __('Created Successfully'));
    }

    public function edit($id)
    {
        $this->viewData['data'] = $this->model->find($id);
        return $this->view('edit');
    }

    public function update(Request $request, $id)
    {
    	unset($this->model->rules['cover']);
		$validation = \Validator::make($request->input(), $this->model->rules);
        if($validation->fails())
            return redirect()->back()->withInput()->withErrors($validation->messages());

        $this->model->findOrFail($id)->update($request->all());
        return redirect()->route('backend.pages.index')->with('doneMessage', __('Updated Successfully'));
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
