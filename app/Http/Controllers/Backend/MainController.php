<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('backend.home');
    }


    public function change_lang($lang)
    {
//        dd($lang);
        \Session::put('locale', $lang);
//        dd(\Session::get('locale'));
        return redirect()->back();
    }

}
