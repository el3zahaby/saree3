<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

/**
 * this class for filter
 * */
class filterController extends Controller
{
    /**
  	 ** @updated_by : Abderrazzak oxa
     * */
    public function filter_price () {
       // filters
        if(Request()->sort == 'low_hight'){
            $products = DB::table('products')
             ->join('sections', 'products.section_id', '=', 'sections.id')
             ->join('users', 'products.user_id', '=', 'users.id')
             ->select(    'products.id as products_id',
                          'products.attachments as products_images',
                          'products.name_and_type as products_name',
                          'products.body as products_desc',
                          'sections.title as products_category',
                          'products.price as products_price',
                          'users.name as user_name')
             ->where('products.status', '=' ,1)   
             ->orderBy('products.price', 'asc')       
             ->paginate(12);
        }
        else{
            $products = DB::table('products')
            ->join('sections', 'products.section_id', '=', 'sections.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select(    'products.id as products_id',
                         'products.attachments as products_images',
                         'products.name_and_type as products_name',
                         'products.body as products_desc',
                         'sections.title as products_category',
                         'products.price as products_price',
                         'users.name as user_name')
            ->where('products.status', '=' ,1)   
            ->orderBy('products.price', 'desc')       
            ->paginate(12);
        }
       return View('website.products.filters.filter')->with('products',$products);
    }

    public function filter_price_list_page () {
    
        if(Request()->sort == 'low_hight'){
            $products = DB::table('products')
                ->join('sections', 'products.section_id', '=', 'sections.id')
                ->join('users', 'products.user_id', '=', 'users.id')
                ->select(    'products.id as products_id',
                            'products.attachments as products_images',
                            'products.name_and_type as products_name',
                            'products.body as products_desc',
                            'sections.title as products_category',
                            'products.price as products_price',
                            'users.name as user_name')
                ->where('products.status', '=' ,1)   
                ->orderBy('products.price', 'desc')       
                ->paginate(12);
        }
        else{
            $products = DB::table('products')
            ->join('sections', 'products.section_id', '=', 'sections.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select(    'products.id as products_id',
                            'products.attachments as products_images',
                            'products.name_and_type as products_name',
                            'products.body as products_desc',
                            'sections.title as products_category',
                            'products.price as products_price',
                            'users.name as user_name')
            ->where('products.status', '=' ,1)   
            ->orderBy('products.price', 'asc')       
            ->paginate(12);
        }
        return View('website.products.filters.filter_list')->with('products',$products);
    }

        //
        public function price_filter () {
            
                $products = DB::table('products')
                    ->join('sections', 'products.section_id', '=', 'sections.id')
                    ->join('users', 'products.user_id', '=', 'users.id')
                    ->select(    'products.id as products_id',
                                'products.attachments as products_images',
                                'products.name_and_type as products_name',
                                'products.body as products_desc',
                                'sections.title as products_category',
                                'products.price as products_price',
                                'users.name as user_name')
                    ->whereRaw("(products.price <= ? AND products.price >= ?) ", [Request()->max_price, Request()->min_price])   
                    ->paginate(12);
                    return View('website.products.filters.filter_min_max_price')->with('products',$products);   
        }
        public function price_filter_list () {
            
            $products = DB::table('products')
                ->join('sections', 'products.section_id', '=', 'sections.id')
                ->join('users', 'products.user_id', '=', 'users.id')
                ->select(    'products.id as products_id',
                            'products.attachments as products_images',
                            'products.name_and_type as products_name',
                            'products.body as products_desc',
                            'sections.title as products_category',
                            'products.price as products_price',
                            'users.name as user_name')
                ->whereRaw("(products.price <= ? AND products.price >= ?) ", [Request()->max_price, Request()->min_price])   
                ->paginate(12);
                return View('website.products.filters.filter_min_max_price_list')->with('products',$products);   
    }


        public function search_products () {
            $products = DB::table('products')
            ->join('sections', 'products.section_id', '=', 'sections.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select(    'products.id as products_id',
                        'products.attachments as products_images',
                        'products.name_and_type as products_name',
                        'products.body as products_desc',
                        'sections.title as products_category',
                        'products.price as products_price',
                        'users.name as user_name')
            ->where('products.name_and_type' , 'like',Request()->search.'%')   
            ->paginate(12);
            return View('website.products.filters.filter_min_max_price')->with('products',$products);
        }

        public function search_products_list () {
            $products = DB::table('products')
            ->join('sections', 'products.section_id', '=', 'sections.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select(    'products.id as products_id',
                        'products.attachments as products_images',
                        'products.name_and_type as products_name',
                        'products.body as products_desc',
                        'sections.title as products_category',
                        'products.price as products_price',
                        'users.name as user_name')
            ->where('products.name_and_type' , 'like',Request()->search.'%')   
            ->paginate(12);
            return View('website.products.filters.filter_min_max_price_list')->with('products',$products);
        }

        public function search_services () {
            $services = DB::table('services')
            ->join('sections', 'services.section_id', '=', 'sections.id')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select(    'services.id as services_id',
                'services.attachment as services_image',
                'services.name as services_name',
                'services.body as services_desc',
                'services.price',
                'services.slug',
                'users.name as user_name',
                'users.slug as user_slug',
                'users.image as userimage',
                'sections.title as section_name')
                ->where('services.name' , 'like',Request()->search.'%')
            ->paginate(12);
 
            return View('website.services.filters.services')->with('services',$services);
        }


        public function filter_city () {
            $products = DB::table('products')
            ->join('sections', 'products.section_id', '=', 'sections.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select(    'products.id as products_id',
                        'products.attachments as products_images',
                        'products.name_and_type as products_name',
                        'products.body as products_desc',
                        'sections.title as products_category',
                        'products.price as products_price',
                        'users.name as user_name')
            ->where('users.city' , '=',Request()->city)   
            ->paginate(12);
            return View('website.products.filters.filter_min_max_price')->with('products',$products);
        }

        public function filter_city_list () {
            $products = DB::table('products')
            ->join('sections', 'products.section_id', '=', 'sections.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select(    'products.id as products_id',
                        'products.attachments as products_images',
                        'products.name_and_type as products_name',
                        'products.body as products_desc',
                        'sections.title as products_category',
                        'products.price as products_price',
                        'users.name as user_name')
            ->where('users.city' , '=',Request()->city)   
            ->paginate(12);
            return View('website.products.filters.filter_min_max_price_list')->with('products',$products);
        }




}
