<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagerController extends Controller
{
    public function index ($page) {

          $p =  DB::table('pages')
          ->where('slug','=',"page/" . $page)
          ->first();

          return View('website.pages.index')->with(settings())->with('page',$p)->with('title',json_decode($p->title)->ar);
    
    }
}
