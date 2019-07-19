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


        $slider_top     = get_slider('home',7);
        $slider_buttom  = get_slider('home',8);
			// this code for visitors
            $services = get_allservices();
            $com = DB::table('homecomponents')->get();
            $slider = get_slider('welcome',9);
			$products = get_all_products();


            return view('website.welcome.welcome',compact('slider_buttom','slider_top'))->with(settings())
                ->with('title','صفحة الترحيب | سريع')->with('products',$products)
                ->with('services',$services)
                ->with('com',$com)
                ->with('')
                ->with('slider',$slider);


    }

}
