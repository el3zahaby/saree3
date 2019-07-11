<?php

namespace App\Http\Controllers\SellerDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;
use Nexmo\Client\Exception\Request;
use App\Models\Product;
use App\User;
use App\Models\Staff;
use App\Notifications\AddProductStaffNoth;

class DashSellerController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Function Show Settings Profile of seller 
     */
    public function  index () {
		$gender = array("Male","Female");
		$all_cats = DB::table('categories')->get();
		$experiences = DB::table('experiences')->get();
		return view('seller_Dashboard.dashboard-settings')->with('all_cats',$all_cats)->with('gender',$gender)->with('countries_en',$this->countries_en)->with('experiences',$experiences);
    }

    /** 
     *  Functon for Show Add Product page
     *  @version 1.0
	 ** @updated_by : Abderrazzak oxa
    */
    public function addproducts_show () {
        DB::table('categories')->get();
        $all_tags = DB::table('tags')->get();

        return View('seller_dashboard.dashboard_addproducts')->with(settings())->with('all_tags',$all_tags);
    }

    /**
    * Function Add New Product 
    * @version 2.0
	* @update Abderrazzak oxa
    */ 

    public function addproducts () {
    	// validation the roles
		$validator = Validator::make(Request()->all(),[
			"body" 			=> "required|max:5000",
			"name_and_type" => "required|string|max:150",
			"section_id" 	=> 'required|exists:sections,id',
			"sub_section" 	=> 'required|exists:sections,id',
			"category" 		=> 'required|exists:sections,id',
			"attachment.0" 	=> "required",
			"attachment.*" 	=> "required|mimes:jpeg,png,jpg,avi,mp4,mkv",
			"Quantity"		=> "required|integer|max:". 9999*9999*9999 ,
			"price" 		=> "required|numeric|max:9999999999999999",
			"user_id" 		=> "required|exists:users,id",
			"branch_id" 	=> "nullable|exists:branches,id",
			"slug" 			=> "required|string|max:150",
			"sku" 			=> "required|string|max:150",
			"branch_name" 	=> "required|string|max:150",
			"trans" 		=> "required|in:1,2",
			"w" 			=> "required|max:150",
			"m" 			=> "required|numeric|max:" . 999999*99999,
		]);

		// display errors if is exist
		if($validator->fails()){
			return back()->withErrors($validator)->withInput();
		}

		// create the new product
        Product::create(Request()->except('attachment','m','w'));

		// This Code For Inserts Attachments Images Files
        $attach = Request()->attachment;
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
            $value->move(public_path('uploads/products'),$path);
            $c += 1;  
        endforeach;
        
        /**
         * Notification for admin 
         * @version 1.0
         */
    
        $staff = Staff::findOrfail(1);
        $user = User::findOrfail(Request()->user_id);
        $staff->notify(new AddProductStaffNoth($user));
        session()->flash("service_created",'product created');
        return back();    
    }

    public function purchases () {
        return View('seller_dashboard.dashboard-purchases');
    }

    public function statement () {
        return View('seller_dashboard.dashboard-statement');
    }

    public function notifications () {
        return View('seller_dashboard.dashboard-notifications');
    }

    public function inbox () {
        return View('seller_dashboard.messages.dashboard-inbox');
    }

    public function buycredits () {
        return View('seller_dashboard.dashboard-buycredits');
    }
    
    public function statistics () {
        return View('seller_dashboard.dashboard-statistics');
    }

    public function addservice () {
        $cats = DB::table('categories')->get();
        $all_tags = DB::table('tags')->get();
        return View('seller_dashboard.dashboard-addservice')->with('categories',$cats)->with('all_tags',$all_tags)->with(settings());
    }


    public function  withdrawals () {
        return View('seller_dashboard.dashboard-withdrawals');
    }

    /** 
      * This for Manage Services   
      *
    */ 
    public function  manageitems () {

        //get All Services :
        $services = DB::table('services')
        ->join('sections', 'services.section_id', '=', 'sections.id')
        ->join('users', 'services.user_id', '=', 'users.id')
        ->select(    'services.id as services_id',
            'services.attachment as services_image',
            'services.name as services_name',
            'services.body as services_desc',
            'services.price',
            'users.name as user_name',
            'sections.title as section_name')
        ->get();

        return View('seller_dashboard.dashboard-manageitems')->with('services',$services);
    }




}