<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\duct;
use Cart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
     // $this->middleware('auth');
    }


    /**
	 * this function for return the products
	 * @updated_by : Abderrazzak oxa
	 * */
    public function ProductItem ($slug) {

        $product = DB::table('products')
        ->join('sections', 'products.section_id', '=', 'sections.id')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->select(    'products.id as products_id',
                     'products.attachments as products_images',
                    'products.name_and_type as products_name',
                    'products.body as products_desc',
                    'sections.title as products_category',
                    'products.price as products_price',
                    'products.trans as trans',
                    'products.created_at as date_created',
                    'users.id as user_id',
                    'users.name as user_name',
                    'users.image as userimage',
                    'users.description as user_desc',
                    'users.country as country')
        ->where('products.slug','=',$slug)    
        ->get();

        if (count($product) < 1 ) {
			return abort(404);
		}

        return View('website.products.productItem')->with(settings())->with('title','الصفحة الرئيسية | سريع')->with('product',$product[0]);
    }

   /**
     ** Show the application Home Page.
     ** @updated_by : Abderrazzak oxa
     */
    public function showHomePage () {
        $services       = get_allservices();
        $products       = get_all_products();
        $slider_top     = get_slider('home',7);
        $slider_buttom  = get_slider('home',8);

        return view('website.home.home')->with(settings())->with('title','الصفحة الرئيسية | سريع')->with('services',$services)->with('slider_top',$slider_top)->with('slider_buttom',$slider_buttom)->with('products',$products);
    }

    public function HowToShop () {
        return view('website.HowToShop')->with(settings())->with('title','صفحة كيف تتسوق | سريع');
    }

    /**
     **  Shop Products Page
     **  @version 1.1
	 ** @updated_by : Abderrazzak oxa
     * */
    public function products_page_show () {
		$products = get_all_products();
	   	$slider_top = get_slider('products',1);
	   	$slider_buttom = get_slider('products',2);
		return View('website.products.products')->with(settings())->with('title','صفحة المنتجات | سريع')->with('slider1',$slider_top)->with('slider_buttom',$slider_buttom)->with('products',$products);
    }

    /**
     **  Shop Products Page
     **  @version 1.1
	 ** @updated_by : Abderrazzak oxa
     * */
    public function products_page_list_show () {
        return View('website.products.products_v2')->with(settings());
    }

    public function ShowServicesPage () {
        $services = get_allservices();
        $slider_top = get_slider('services',3);
        $slider_buttom = get_slider('services',4);
        return View('website.services.services')->with(settings())->with('title','صفحة الخدمات | سريع')->with('services',$services)->with('slider_top',$slider_top)->with('slider_buttom',$slider_buttom);
    }


    /**
     ** Service Item Page
     ** @version 1.0
	 * @updated_by : abderrazzak oxa
     * */
    public function ShowServicesItem ( $slug ) {
           $service =  get_service_by_slug($slug);
           if ($service == null) {
               return redirect('/');
           }else {
               return View('website.services.serviceItem')->with(settings())->with('service',$service)->with('title','خدمه');
           }

    }


    public function ShowServicesPage_listview () {
        $services = get_allservices();

    	return View('website.services.services_listView')->with(settings())->with('title','صفحة الخدمات | سريع')->with('services',$services);
    }
    
    public function ShowShopPage () {

        $branches = DB::table('branches')
            ->join('users', 'branches.user_id', '=', 'users.id')
                ->select(   'branches.id as id',

                    'branches.name as name',
                    'users.name as username')
            ->where('branches.status','=','active')
            ->get();
        return View('website.shop.shop')->with(settings())->with('title','صفحة المعارض | سريع')->with('branches',$branches);
    }

    public function ShowForumPage () {
        $forums = get_all_forums();
        $forum_sections = get_all_forum_sections();
        return View('website.forums.forum')->with(settings())->with('title','صفحة المجتمع | سريع')->with("forums",$forums)->with('forumsec',$forum_sections);
    }


    public function Openfum_show ($slug) {
		$forum = get_forum_by_slug($slug);
        return View('website.forums.openforum')->with(settings())->with('forum',$forum)->with('title',$forum->title);
    }


    /**
     ** this function for Show Fav Paage
     ** @updated_by : Abderrazzak oxa
     */
    public function ShowFavouritesPage () {
       $fav = DB::table('productfavs')
       ->join('products', 'productfavs.product_id', '=', 'products.id')
       ->join('users', 'productfavs.user_id', '=', 'users.id')
       ->select('products.id as id',
                'products.name_and_type as product_name',
                'products.attachments as products_images',
                'products.price as price',
                'products.body as desc',
                'users.name as username',
                'products.section_id as category',
                'users.image as userimage')
           ->where('users.id','=',user()->id)
           ->paginate(8);

        return View('website.favourites')->with(settings())->with('title','صفحة المفضلة | سريع')->with('fav',$fav);
    }

    public function getcity () {
        $id = Request()->id;
        $title = Request()->title;
        echo "<option value=\"0\" disabled selected> $title </option>";
        foreach (getCityOfCountry($id) as $key => $value):
            echo "<option value='$value->name'> $value->name </option>";
         endforeach;
    }

    public function test () {
        return View ('website.test',settings());
        
    }

}
