<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\HelpersTrait;
use Illuminate\Database\Eloquent\Model;
use Response;

abstract class AbstractController extends  Controller {
    use HelpersTrait;

    public $model;
    public $view_folder;
    protected $viewData = [];

    public function __construct(Model $model,$view_folder = '')
    {
        $this->model = $model;
        $this->view_folder = 'backend.'. $view_folder;
        $this->viewData['locale'] = \Session::get('locale');
        $this->viewData['title'] = __(ucfirst($view_folder));
    }

    protected function view($file = ''){
        if(!empty($file))
            return view($this->view_folder . '.' . $file, $this->viewData);
        return view($this->view_folder, $this->viewData);
    }
}