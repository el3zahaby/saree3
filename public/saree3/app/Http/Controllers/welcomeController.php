<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Section;


class welcomeController extends Controller
{


    /**
     * Show the application Welcome Page.
     * @version  1.1
     */
    public function welcome () {

        if(user()){
        	// this code for users
           return  redirect('/home');
        }else {
			// this code for visitors
            $services = get_allservices();
            $com = DB::table('homecomponents')->get();
            $slider = get_slider('welcome',9);
			$products = get_all_products();

            return view('website.welcome.welcome')->with(settings())->with('title','صفحة الترحيب | سريع')->with('products',$products)->with('services',$services)->with('com',$com)->with('slider',$slider);
        }

    }

}
