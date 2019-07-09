<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Hash;
use Auth;
use App\rooms;
use App\messages;
use App\Models\Service;
use App\Models\Staff;
use App\Notifications\AddServiceStaffNoth;



class manageUsers extends Controller
{
    /**
    *** This Function For Logout User
    *** @version 1.0
    * * @author : Ayoub Tamous
	 * @update_by: Abderrazzak oxa
    */
    public function Logout () {
        Auth()->guard('web')->logout();
        return redirect('/');
    }

    /**
    * * Show Login User Page
    * * @version 1.1
    * * @author : Ayoub Tamous
    */
    public function login_show(){
        return view('front.login');
    }

    /**
    * * Login User
    * * @version 1.1
    * * @author : Ayoub Tamous
	 * @updated_by : abderrazzak oxa
    */
    public function login(Request $re){

		// validate user request like email and password
        $validator = Validator::make($re->all(),[
            "email" => "required|email|exists:users,email",
            "password" => "required",
        ]);

        // display error if is exist
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // check if user is valid
		if(Hash::check($re->password,$re->password)){
			$remember = $re->filled('remember');
			if($remember){$remember = "true"; } else { $remember =  "false"; }

			if(Auth()->guard('users')->attempt([ // login the user
				"email" => $re->email,
				"password" => $re->password,
			],$remember)){

				if(Auth()->guard('users')->check()){
					return redirect('/home');
				}
			}
		}
		else {
			return back()->withErrors(["password" => "sorry ! password not correct"])->withInput();
		}
    }



    /*
     * * Show Join Page
     * * @version 1.1
     * * @author : Ayoub Tamous
     */
    public function join_show() {
        $type = Request()->type;  
        $gender = array("Male","Female");

        return view('website.join.join',['type'=>$type,'gender' => $gender , 'countries_en' => $this->countries_en])->with(settings());
    }

    /*
     * * Register Seller
     * * @version 1.1
     * * @author : Ayoub Tamous
     */
    public function seller_register(Request $re){

        $validator = Validator::make($re->all(),[
            "seller_name" => 'required|max:150',
            "seller_username" => 'required|unique:users,username|max:150',
            "seller_email" => 'required|email|unique:users,email|max:150',
            "seller_password" => 'required|min:8',
            "seller_country" => ['required',function($attribute, $value, $fail) {
            if ($value <= 0 || $value >= 242) {
                return $value==0? $fail('الدولة مطلوبة') : $fail('الدولة التي أدخلتها غير صحيحة');
            }
        }],
            "seller_city" => 'required|max:150',
            "seller_mobile" => 'required|unique:users,mobile|max:20',
            "gender" => 'required|in:0,1',
            "year" => 'required|numeric',
            "month" => 'required|numeric|max:12|min:1',
            "day" => 'required|numeric|max:30|min:1',
        ]);
        if($validator->fails()){
			return back()->withInput()->withErrors($validator->errors());
        }
        else{
            $ip = "";
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
           $verfiy_code = substr(sha1(time()),0,5);
           $mobile = $re->seller_mobile;
           $first = explode(" ",$re->seller_name)[0];
           $insert_seller = DB::table('users')
               ->insertGetId([
                "name" => $re->seller_name,
                "username" => $re->seller_username,
                "email" => $re->seller_email,
                "password" => Hash::make($re->seller_password),
                "country" => $re->seller_country,
                "city" => $re->seller_city,
                "mobile" => $mobile,
                "verfiy_code" => $verfiy_code,
                "status" => "1",
                "account_type" => "0",
                "verfied" => "0",
                "last_ip" => $ip,
                "dirthyear" => $re->year,
                "dirthmonth" => $re->month,
                "dirthday" => $re->day,
                "gender" => $re->gender,
                "created_at" => Carbon::now(),

               ]);
            if($insert_seller != null){
                session()->put("remain_verfiy","1");
                session()->put("userid",$insert_seller);
                $mobile = substr($mobile,1);
//                $message = "Hi ".$first." , Welcome To The sreeea.com Your Activate Code ".$verfiy_code." Thank you";
//                $content = $this->send($mobile,$message);
                return redirect('/join/seller/verify');

            }


        }

    }

    public function seller_register_verify_show(){
        if(session()->has("remain_verfiy")){
             return view("website.seller_verify",settings() );
        }
        else{
             return abort(404);
        }

    }

    public function seller_register_verify(Request $re){
        $validator = Validator::make($re->all(),[
            "verify_code" => "required|max:5|min:5"
        ]);



		if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else{
            $check = DB::table('users')
                ->where([
                    ["id",session()->get("userid")],
                    ["verfiy_code",$re->verify_code]
                ])
                ->first();
            if($check){
               $account_verify = DB::table('users')
                   ->where([
                    ["id",session()->get("userid")],
                    ["verfiy_code",$re->verify_code]
                    ])
                   ->update([
                       "verfied" => "1",
                       "verfiy_code" =>""
                   ]);
                session()->forget("userid");
                session()->forget("remain_verfiy");
                session()->flash("account_created_success","1");
                return redirect("/login");
            }
            else{
                return back()->withErrors(["wrong_code" => "This code is invalid"]);
            }
            //return $check;

        }

    }


    /**
    * * Register Buyer
    * * @version 1.1
    * * @author : Ayoub Tamous
    */
    public function buyer_register () {


        /*  Validation of Data Request [Form join buyer] */
        $validator = Validator::make(Request()->all(),[
            "buyer_name" => 'required|max:150',
            "buyer_email" => 'required|email|unique:users,email|max:150',
            "buyer_username" => 'required|unique:users,username|max:150',
            "buyer_password" => 'required|min:8',
            "buyer_country" => ['required',function($attribute, $value, $fail) {
			if ($value <= 0 || $value >= 242) {
				return $value==0? $fail('الدولة مطلوبة') : $fail('الدولة التي أدخلتها غير صحيحة');
			}
        }],
            "buyer_city" => 'required|max:150',
			"buyer_mobile" => 'required|string|unique:users,mobile|max:20',
			"gender" => 'required|in:0,1',
			"year" => 'required|numeric',
			"month" => 'required|numeric|max:12|min:1',
			"day" => 'required|numeric|max:30|min:1',
        ]);

        /* Test if Validator Return Any Error */
        if ($validator->fails()) {
//        	return $validator->errors();
            return back()->withInput()->withErrors($validator->errors());
        }
        else{
            /* Get And Save IP fo Buyer Register */
            $ip = "";
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            /* Insert This Buyer In Database */
           $insert_seller = DB::table('users')
               ->insertGetId([
                "name" => Request()->buyer_name,
                "email" => Request()->buyer_email,
                "username" => Request()->buyer_username,
                "password" => Hash::make(Request()->buyer_password),
                "country" => $this->countries[Request()->buyer_country - 1],
                "city" => Request()->buyer_city,
                "status" => "1",
                "account_type" => "1",
                "verfied" => "1",
                "slug" => str_slug(Request()->buyer_name),
                "last_ip" => $ip,
                "created_at" => Carbon::now()
               ]);
            if($insert_seller != null){
                session()->flash("account_created_success","1");
                return redirect("/");
            }

        }

    }


   /*
   * * User Profile
   * * @version 1.1
   * * @author : Ayoub Tamous
   */
    public function loginprofile () {
        $my_services =  get_services_of_user(user()->id);
       // dd($my_services);
        return view('website.author-profile')->with(settings())->with('my_services',$my_services)->with('title','الصفحة الشخصيه - سريع');
   }

  /*
   * * User Profile
   * * @version 1.1
   * * @author : Ayoub Tamous
   */
   public function userprofile ($slug) {
        $user = DB::table('users')->where('slug','=',$slug)->first();
        $user_services = get_services_of_user($user->id);
        return View('website.profiles.profile')->with(settings())->with('user',$user)->with('user_services',$user_services);
    }


    /*
    * * Function Send Message To Mobile
    * * @version 1.1
    * * @author : Ayoub Tamous
    */
    public function send($mobile,$message){
        $smsconfig = DB::table('smsapiconfigs')->first();
        $url = 'http://www.smsapril.com/api.php?' . http_build_query([
                'comm' => "sendsms",
                'user' => $smsconfig->user,
                'pass' => $smsconfig->pass,
                'to' => $mobile,
                'message' => $message,
                'sender' => $smsconfig->sender,
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $content = curl_exec($ch);

        return $content;
    }

    /*
   * * This Function For Show Page Of Add New Service
   * * @version : 1.1
   * * @author : ayoub tamous
   */
    public function seller_add_service_show(){
        $cats = DB::table('categories')->get();
        $all_tags = DB::table('tags')->get();

        return view('seller_Dashboard.add_service')->with(settings());
    }

    /**
    * * This Function For Add New Service
    * * @version : 1.1
    * * @author : ayoub tamous
	 * @updated_by : Abderrazzak oxa
   */
    public function seller_add_service (){

    	// firstly Validation
		$validator = Validator::make(Request()->all(),[
			"name" 				=> "required|string|max:150",
			"body" 				=> "required|max:5000",
			"section_id" 		=> 'required|exists:sections,id',
			"sub_section" 		=> 'required|exists:sections,id',
			"sub_sub_section" 	=> "required|exists:sections,id",
//			"category" 			=> "required|exists:categories,id",
			"attachment.0" 		=> "required",
			"attachment.*" 		=> "required|mimes:jpeg,png,jpg,avi,mp4,mkv",
			"to" 				=> "required|in:1,2,3,4",
			"experiences"		=> "required|string|max:5000000" ,
			"skills.0" 			=> "required",
			"skills.*" 			=> "required|exists:tags,id",
			"price" 			=> "required|numeric|max:9999999999999999",
		]);

		if($validator->fails()){

			return back()->withErrors($validator)->withInput();
		}

		// secondly create the Service

        Service::create([
            'user_id' => user()->id,
            'name' => Request()->name,
            'body' => Request()->body,
            'section_id' => Request()->section_id,
            'sub_section' => Request()->sub_section,
            'sub_sub_section' => Request()->sub_sub_section,
            'to' => Request()->to,
            'experiences' => Request()->experiences,
            'slug' => str_slug(Request()->name),
            'skills' =>  implode(',',Request()->skills),
            'price' => Request()->price
        ]);

        /*
        This Code For Inserts Attachments Images Files 
        */
        $attach = Request()->attachment;

        foreach ($attach as $key => $value):
            $extension = $value->getClientOriginalExtension();
            $path = "service_attachment".time().rand(25,1500).".".$extension;
            $json [] = ['img' => $path ];
            $attachment_images = json_encode($json);

            /* insert attachments in column products.attachments  [json] */
            DB::table('services')
            ->where('name', Request()->name)
            ->update(['attachment'  => $attachment_images]);

            $value->move(public_path('uploads/services'),$path);
		endforeach;

        /**
         * Notification for admin 
         * @version 1.0
         */
        
        $staff = Staff::findOrfail(1);
        $user = User::findOrfail(user()->id);

        $staff->notify(new AddServiceStaffNoth($user));

        session()->flash("service_created",'services created');
        return back();    

    }



    public function show_service($id){
         $serviceinfo = Service::find($id);
         // return (Array)$serviceinfo->attachments;
         return view('front.service_show')->with('serviceinfo',$serviceinfo)->with('countries_en',$this->countries_en);
    }

    /*
    * * This Function For Show Page Of Settings of seller
    * * @version : 1.1
    * * @author : ayoub tamous
    */
    public function seller_settings(){
        $gender = array("Male","Female");
        $all_cats = DB::table('categories')->get();
        $experiences = DB::table('experiences')->get();
        return view('seller_dashboard.dashboard-settings')->with('all_cats',$all_cats)->with('gender',$gender)->with('countries_en',$this->countries_en)->with('experiences',$experiences);
    }


    /*
     * * This Function For Edit Information's of seller
     * * @version : 1.1
     * * @author : ayoub tamous
     */
    public function seller_settings_normal(Request $re){

            $validator = Validator::make(Request()->all(),[
                "experience_year" => 'required|integer|max:20|min:1',
                "description" => 'required|max:5000',
                "image" => 'mimes:jpeg,png,jpg',
            ]);

            if ($validator->fails()) {
            	return back()->withErrors($validator)->withInput();
			}

            /* Jobs and skiles */
            $jobs_type="";
            if(!empty(Request()->job)){
                $jobs_type = implode(',',Request()->job);
            }
             $skilles="";
            if(!empty(Request()->skills)){
                $skilles   = implode(',',Request()->skills);
            }



           if(Request()->File('image')){
                $file      = Request()->File('image');
                $extension = $file->getClientOriginalExtension();
                $path      = "user_".time().rand(800,1500).rand(25,1500).".".$extension;
                $file      = $file->move(public_path('images/avatars'),$path);
                
                $user_update_profile = DB::table('users')
                ->where([['id',user()->id]])
                ->update([
                    "experienceyears"     => Request()->experience_year,
                    "certificates"        => Request()->certificates,
                    "description"         => Request()->description,
                    "image"               => $path,
                    'skills'              => $skilles,
                    'job'                 => $jobs_type,

                ]);

                $Delete_user_expericences = DB::table('user_experiences')
                    ->where([['userid',user()->id]])
                    ->delete();

                if(Request()->experience){
                    foreach(Request()->experience as $ex){
                        $insert_ex_related_to_user = DB::table('user_experiences')
                            ->insert([
                                "userid"       => user()->id,
                                "experienceid" => $ex,
                            ]);
                    }
                }
                 if($user_update_profile){
                    session()->flash("success","تم تعديل معلومات البروفيل بنجاح");
                    return back();
                 }
            }
            else{

                $user_update_profile = DB::table('users')
                ->where([['id',user()->id]])
                ->update([
                    "experienceyears" => $re->experience_year,
                    "certificates" => $re->certificates,
                    "description" => $re->description,
                ]);

                 $Delete_user_expericences = DB::table('user_experiences')
                    ->where([['userid',user()->id]])
                    ->delete();
                    if($re->experience){
                    foreach($re->experience as $ex){
                        $insert_ex_related_to_user = DB::table('user_experiences')
                            ->insert([
                                "userid" => user()->id,
                                "experienceid" => $ex,

                            ]);
                    }

                }
                session()->flash("success","تم تعديل معلومات البروفيل بنجاح");
                return back();
            }
    }

    /**
     * * This Function For Edit Password of seller
     * * @version : 1.1
     * * @author : ayoub tamous
     * * @updated_by: abderrazzak oxa
     */
    public function seller_settings_password(){

    	// validation
		$vaildator = Validator::make(Request()->all(),[
			"current_password" => ['required',function($attribute, $value, $fail) {
				if (!Hash::check($value,user()->password) && !empty($value)) {
					return $fail('خطأ في كلمة المرور الحالية.');
				}
			 }],
            "new_password" => 'required|min:8|max:250',
            "new_password_repeat" => 'required|same:new_password',
        ]);

		// display errors if it exists
        if($vaildator->fails()){
            return back()->withErrors($vaildator)->withInput();
        }

        // update this user
		DB::table('users')
		->where([['id',user()->id]])
		->update([
			"password" => Hash::make(Request()->new_password),
		]);

		session()->flash("success","تم تعديل كلمة المرور بنجاح");
		return back();
    }

    /**
     * * This Function For Check username of seller
     * * @version : 1.1
     * * @author : ayoub tamous
     */
    public function seller_check_username(){
    	// request ajax
        if(Request()->ajax()){
            $check = DB::table('users')
                ->where([['username',Request()->username]])
                ->first();

            if($check == null) {
                return response()->json(["success" => "true"]);
            }
            else{
                return response()->json(["success" => "false"]);
            }

        }
    }

    /*
     * * This Function For Check Carrent Password of seller
     * * @version : 1.1
     * * @author : ayoub tamous
     */
    public function seller_check_current_password(Request $re){
        if($re->ajax()){
             if(!Hash::check($re->currentpassword,Auth::guard('users')->user()->password)){
                return response()->json(["success" => "false"]);
            }
            else{
                return response()->json(["success" => "true"]);
            }
        }
    }




    public function profile_show($username){
        $userinfo = users::where([['username',$username]])->first();
        if($userinfo){
            if($userinfo->account_type == 0){
                  $get_services = services::where([['userid',$userinfo->id]])->limit(3)->get();
                     return view('front.profile')->with('userinfo',$userinfo)->with('countries_en',$this->countries_en)->with('get_services',$get_services);
            }

        }

    }
    public function buyer_page_show(){
         $slider = home_slider::all();
         $cats = categories::all();
         $services = services::limit(45)->get();
         return view('front.buyer_page')->with('cats',$cats)->with('services',$services)->with('slider',$slider);
    }
    public function buyer_page_show_2(){
         $slider = home_slider::all();
         $cats = categories::all();
         $services = services::orderBy('services.created_at', 'DESC')->paginate(4);
         return view('front.categories')->with('cats',$cats)->with('services',$services)->with('slider',$slider);
    }
    public function cat_filters($cat,$subcat,$subsubcat,Request $re){
        $getcatid = categories::where([['name',$cat]])->first();
        $slider = $getcatid->related_sliders;
        $subcatid = sub_categories::where([['name',$subcat]])->select('id')->first();
        $subsubcats = sub_sub_category::where([['id',$subsubcat]])->select('id')->first();
        $services = services::where([['subsubcatid',$subsubcats->id]])->orderBy('services.created_at', 'DESC')->paginate(4);
              $all_tags = DB::table('tags')->get();
       return view('front.categories')->with('slider',$slider)->with('cats',$subsubcats)->with('services',$services)->with('all_tags',$all_tags)->with('countries_en',$this->countries_en);
    }
    public function chat_view($id){

        $get_friends = rooms::where(function($q) {
          $q->where([['parent',Auth::guard('users')->user()->id]])
            ->orWhere([['child',Auth::guard('users')->user()->id]]);
      })->get();


        $room = rooms::find($id);

        if($room && ($room->parent == Auth::guard('users')->user()->id | $room->child == Auth::guard('users')->user()->id)){

             $rooms_messages = messages::where([['roomid',$id]])->get();
             return view('chat_files.chat')->with('friends',$get_friends)->with('rooms_messages',$rooms_messages)->with('room',$room);
        }
       else{
          return  abort(404);
       }

    }
    public function insert_messages(Request $re){

        if($re->ajax()){
            $check_belong_room = rooms::where(function($q) {
                $q->where([['parent',Auth::guard('users')->user()->id]])
                ->orWhere([['child',Auth::guard('users')->user()->id]]);
            })->where([['id',$re->room]])->first();

            if($check_belong_room != null){
                if($check_belong_room->parentblock == 0 && $check_belong_room->childblock == 0){
                    $insert_message = DB::table('messages')->insert([
                    "message" => $re->message,
                    "roomid" => $re->room ,
                    "parent" => Auth::guard('users')->user()->id ,

                ]);


                if($insert_message){
                    return response()->json(["success" => "true"]);
                }
                else{
                     return response()->json(["success" => "again"]);
                }

                }
                else{
                    return response()->json(["success" => "please try again"]);
                }
            }
            else{
                return response()->json(["success" => "why!!"]);
            }
        }

    }
    public function rooms_block(Request $re){
        if($re->ajax()){
              $check_belong_room = rooms::where(function($q) {
                $q->where([['parent',Auth::guard('users')->user()->id]])
                ->orWhere([['child',Auth::guard('users')->user()->id]]);
            })->where([['id',$re->room]])->first();
            if($check_belong_room != null){
                if($check_belong_room->parent == Auth::guard('users')->user()->id){
                   if($check_belong_room->childblock == 0){
                       if($check_belong_room->parentblock == 0){
                           $value = 1;
                           $res = "block";
                       }
                       else{
                           $value = 0;
                           $res = "unblock";
                       }
                       $update_block = DB::table('rooms')
                        ->where([['id',$re->room]])
                        ->update([
                            "parentblock" => $value,
                            "updated_at" => Carbon::now(),
                        ]);
                     return response()->json(["success" => $res ,"element" => $check_belong_room->child]);
                   }
                     else{
                      return response()->json(["fail" => "sorry"]);
                  }

                }
              elseif($check_belong_room->child == Auth::guard('users')->user()->id){
                  if($check_belong_room->parentblock == 0){
                       if($check_belong_room->childblock == 0){
                           $value = 1;
                           $res = "block";
                       }
                       else{
                           $value = 0;
                            $res = "unblock";
                       }
                       $update_block = DB::table('rooms')
                        ->where([['id',$re->room]])
                        ->update([
                            "childblock" => $value,
                            "updated_at" => Carbon::now(),
                        ]);
                     return response()->json(["success" => $res,"element" => $check_belong_room->parent]);
                   }
                  else{
                      return response()->json(["fail" => "sorry"]);
                  }
              }
                }
            else{
                return response()->json(["success" => "why!!"]);
            }
        }
    }
    public function room_voice_upload(Request $re){
        if($re->ajax()){
                $check_belong_room = rooms::where(function($q) {
                $q->where([['parent',Auth::guard('users')->user()->id]])
                ->orWhere([['child',Auth::guard('users')->user()->id]]);
            })->where([['id',$re->room]])->first();
            if($check_belong_room != null){
                if($check_belong_room->parentblock == 0 && $check_belong_room->childblock == 0){
                    $extension = $re->audio_data->getClientOriginalExtension();
                    $path = "service_attachment".time().rand(25,1500).".".$extension;
                    $file = $re->audio_data->move(public_path('uploads/services'),$path);

                    $insert_message = DB::table('messages')
                ->insert([
                    "message" => $path,
                    "roomid" => $re->room ,
                    "parent" => Auth::guard('users')->user()->id ,
                    "created_at" => Carbon::now()
                ]);
                if($insert_message){
                    return response()->json(["success" => $extension]);
                }
                else{
                     return response()->json(["success" => "again"]);
                }

                }
                else{
                    return response()->json(["success" => "please try again"]);
                }

            }
            else{
                return response()->json(["success" => "why!!"]);
            }
        }
    }

	/**
	 * * List Of countries AR|EN
	 * * @version 1.1
	 * * @author : Ayoub Tamous
	 * * @update_by : abderrazzak oxa
	 */
	public $countries_ar = [
		"SA" =>'المملكة العربية السعودية',
		"ET" =>'إثيوبيا',
		"AZ" =>'أذربيجان',
		"AM" =>'أرمينيا',
		"AW" =>'أروبا',
		"ER" =>'إريتريا',
		"ES" =>'أسبانيا',
		"AU" =>'أستراليا',
		"EE" =>'إستونيا',
		"IL" =>'إسرائيل',
		"AF" =>'أفغانستان',
		"IO" =>'إقليم المحيط الهندي البريطاني',
		"EC" =>'إكوادور',
		"AR" =>'الأرجنتين',
		"JO" =>'الأردن',
		"AE" =>'الإمارات العربية المتحدة',
		"AL" =>'ألبانيا',
		"BR" =>'البرازيل',
		"PT" =>'البرتغال',
		"BA" =>'البوسنة والهرسك',
		"GA" =>'الجابون',
		"DZ" =>'الجزائر',
		"DK" =>'الدانمارك',
		"CV" =>'الرأس الأخضر',
		"PS" =>'السلطة الفلسطينية',
		"SV" =>'السلفادور',
		"SN" =>'السنغال',
		"SD" =>'السودان',
		"SE" =>'السويد',
		"SO" =>'الصومال',
		"CN" =>'الصين',
		"IQ" =>'العراق',
		"PH" =>'الفلبين',
		"CM" =>'الكاميرون',
		"CG" =>'الكونغو',
		"CD" =>'الكونغو (جمهورية الكونغو الديمقراطية)',
		"KW" =>'الكويت',
		"DE" =>'ألمانيا',
		"HU" =>'المجر',
		"MA" =>'المغرب',
		"MX" =>'المكسيك',
		"UK" =>'المملكة المتحدة',
		"TF" =>'المناطق الفرنسية الجنوبية ومناطق انتراكتيكا',
		"NO" =>'النرويج',
		"AT" =>'النمسا',
		"NE" =>'النيجر',
		"IN" =>'الهند',
		"US" =>'الولايات المتحدة',
		"JP" =>'اليابان',
		"YE" =>'اليمن',
		"GR" =>'اليونان',
		"AQ" =>'أنتاركتيكا',
		"AG" =>'أنتيغوا وبربودا',
		"AD" =>'أندورا',
		"ID" =>'إندونيسيا',
		"AO" =>'أنغولا',
		"AI" =>'أنغويلا',
		"UY" =>'أوروجواي',
		"UZ" =>'أوزبكستان',
		"UG" =>'أوغندا',
		"UA" =>'أوكرانيا',
		"IR" =>'إيران',
		"IE" =>'أيرلندا',
		"IS" =>'أيسلندا',
		"IT" =>'إيطاليا',
		"PG" =>'بابوا-غينيا الجديدة',
		"PY" =>'باراجواي',
		"BB" =>'باربادوس',
		"PK" =>'باكستان',
		"PW" =>'بالاو',
		"BM" =>'برمودا',
		"BN" =>'بروناي',
		"BE" =>'بلجيكا',
		"BG" =>'بلغاريا',
		"BD" =>'بنجلاديش',
		"PA" =>'بنما',
		"BJ" =>'بنين',
		"BT" =>'بوتان',
		"BW" =>'بوتسوانا',
		"PR" =>'بورتو ريكو',
		"BF" =>'بوركينا فاسو',
		"BI" =>'بوروندي',
		"PL" =>'بولندا',
		"BO" =>'بوليفيا',
		"PF" =>'بولينزيا الفرنسية',
		"PE" =>'بيرو',
		"BY" =>'بيلاروس',
		"BZ" =>'بيليز',
		"TH" =>'تايلاند',
		"TW" =>'تايوان',
		"TM" =>'تركمانستان',
		"TR" =>'تركيا',
		"TT" =>'ترينيداد وتوباجو',
		"TD" =>'تشاد',
		"CL" =>'تشيلي',
		"TZ" =>'تنزانيا',
		"TG" =>'توجو',
		"TV" =>'توفالو',
		"TK" =>'توكيلاو',
		"TO" =>'تونجا',
		"TN" =>'تونس',
		"TP" =>'تيمور الشرقية (تيمور الشرقية)',
		"JM" =>'جامايكا',
		"GM" =>'جامبيا',
		"GI" =>'جبل طارق',
		"GL" =>'جرينلاند',
		"AN" =>'جزر الأنتيل الهولندية',
		"PN" =>'جزر البتكارين',
		"BS" =>'جزر البهاما',
		"VG" =>'جزر العذراء البريطانية',
		"VI" =>'جزر العذراء، الولايات المتحدة',
		"KM" =>'جزر القمر',
		"CC" =>'جزر الكوكوس (كيلين)',
		"MV" =>'جزر المالديف',
		"TC" =>'جزر تركس وكايكوس',
		"AS" =>'جزر ساموا الأمريكية',
		"SB" =>'جزر سولومون',
		"FO" =>'جزر فايرو',
		"UM" =>'جزر فرعية تابعة للولايات المتحدة',
		"FK" =>'جزر فوكلاند (أيزلاس مالفيناس)',
		"FJ" =>'جزر فيجي',
		"KY" =>'جزر كايمان',
		"CK" =>'جزر كوك',
		"MH" =>'جزر مارشال',
		"MP" =>'جزر ماريانا الشمالية',
		"CX" =>'جزيرة الكريسماس',
		"BV" =>'جزيرة بوفيه',
		"IM" =>'جزيرة مان',
		"NF" =>'جزيرة نورفوك',
		"HM" =>'جزيرة هيرد وجزر ماكدونالد',
		"CF" =>'جمهورية أفريقيا الوسطى',
		"CZ" =>'جمهورية التشيك',
		"DO" =>'جمهورية الدومينيكان',
		"ZA" =>'جنوب أفريقيا',
		"GT" =>'جواتيمالا',
		"GP" =>'جواديلوب',
		"GU" =>'جوام',
		"GE" =>'جورجيا',
		"GS" =>'جورجيا الجنوبية وجزر ساندويتش الجنوبية',
		"GY" =>'جيانا',
		"GF" =>'جيانا الفرنسية',
		"DJ" =>'جيبوتي',
		"JE" =>'جيرسي',
		"GG" =>'جيرنزي',
		"VA" =>'دولة الفاتيكان',
		"DM" =>'دومينيكا',
		"RW" =>'رواندا',
		"RU" =>'روسيا',
		"RO" =>'رومانيا',
		"RE" =>'ريونيون',
		"ZM" =>'زامبيا',
		"ZW" =>'زيمبابوي',
		"WS" =>'ساموا',
		"SM" =>'سان مارينو',
		"PM" =>'سانت بيير وميكولون',
		"VC" =>'سانت فينسنت وجرينادينز',
		"KN" =>'سانت كيتس ونيفيس',
		"LC" =>'سانت لوشيا',
		"SH" =>'سانت هيلينا',
		"ST" =>'ساوتوماي وبرينسيبا',
		"SJ" =>'سفالبارد وجان ماين',
		"SK" =>'سلوفاكيا',
		"SI" =>'سلوفينيا',
		"SG" =>'سنغافورة',
		"SZ" =>'سوازيلاند',
		"SY" =>'سوريا',
		"SR" =>'سورينام',
		"CH" =>'سويسرا',
		"SL" =>'سيراليون',
		"LK" =>'سيريلانكا',
		"SC" =>'سيشل',
		"RS" =>'صربيا',
		"TJ" =>'طاجيكستان',
		"OM" =>'عمان',
		"GH" =>'غانا',
		"GD" =>'غرينادا',
		"GN" =>'غينيا',
		"GQ" =>'غينيا الاستوائية',
		"GW" =>'غينيا بيساو',
		"VU" =>'فانواتو',
		"FR" =>'فرنسا',
		"VE" =>'فنزويلا',
		"FI" =>'فنلندا',
		"VN" =>'فيتنام',
		"CY" =>'قبرص',
		"QA" =>'قطر',
		"KG" =>'قيرقيزستان',
		"KZ" =>'كازاخستان',
		"NC" =>'كاليدونيا الجديدة',
		"KH" =>'كامبوديا',
		"HR" =>'كرواتيا',
		"CA" =>'كندا',
		"CU" =>'كوبا',
		"CI" =>'كوت ديفوار (ساحل العاج)',
		"KR" =>'كوريا',
		"KP" =>'كوريا الشمالية',
		"CR" =>'كوستاريكا',
		"CO" =>'كولومبيا',
		"KI" =>'كيريباتي',
		"KE" =>'كينيا',
		"LV" =>'لاتفيا',
		"LA" =>'لاوس',
		"LB" =>'لبنان',
		"LI" =>'لختنشتاين',
		"LU" =>'لوكسمبورج',
		"LY" =>'ليبيا',
		"LR" =>'ليبيريا',
		"LT" =>'ليتوانيا',
		"LS" =>'ليسوتو',
		"MQ" =>'مارتينيك',
		"MO" =>'ماكاو',
		"FM" =>'ماكرونيزيا',
		"MW" =>'مالاوي',
		"MT" =>'مالطا',
		"ML" =>'مالي',
		"MY" =>'ماليزيا',
		"YT" =>'مايوت',
		"MG" =>'مدغشقر',
		"EG" =>'مصر',
		"MK" =>'مقدونيا، جمهورية يوغوسلافيا السابقة',
		"BH" =>'مملكة البحرين',
		"MN" =>'منغوليا',
		"MR" =>'موريتانيا',
		"MU" =>'موريشيوس',
		"MZ" =>'موزمبيق',
		"MD" =>'مولدوفا',
		"MC" =>'موناكو',
		"MS" =>'مونتسيرات',
		"ME" =>'مونتينيغرو',
		"MM" =>'ميانمار',
		"NA" =>'ناميبيا',
		"NR" =>'ناورو',
		"NP" =>'نيبال',
		"NG" =>'نيجيريا',
		"NI" =>'نيكاراجوا',
		"NU" =>'نيوا',
		"NZ" =>'نيوزيلندا',
		"HT" =>'هايتي',
		"HN" =>'هندوراس',
		"NL" =>'هولندا',
		"HK" =>'هونغ كونغ SAR',
		"WF" =>'واليس وفوتونا'
	];
	public $countries_en = [
		"ALL" =>'Select your Country...',
		"SA" => 'Saudi Arabia',
		"ET" => 'Ethiopia',
		"AZ" => 'Azerbaijan',
		"AM" => 'ARM',
		"AW" => 'Aruba',
		"ER" => 'Eritrea',
		"ES" => 'Spain',
		"AU" => 'Australia',
		"EE" => 'Estonia',
		"IL" => 'Israel',
		"AF" => 'Afghanistan',
		"IO" => 'British Indian Ocean Territory',
		"EC" => 'Ecuador',
		"AR" => 'Argentina',
		"JO" => 'Jordan',
		"AE" => 'United Arab Emirates',
		"AL" => 'Albania',
		"BR" => 'Brazil',
		"PT" => 'Portugal',
		"BA" => 'Bosnia and Herzegovina',
		"GA" => 'Gabon',
		"DZ" => 'Algeria',
		"DK" => 'Denmark',
		"CV" => 'Cape Verde',
		"PS" => 'PA',
		"SV" => 'El Salvador',
		"SN" => 'Senegal',
		"SD" => 'Sudan',
		"SE" => 'Sweden',
		"SO" => 'Somalia',
		"CN ="> 'China',
		"IQ" => 'Iraq',
		"PH" => 'Philippines',
		"CM" => 'Cameroon',
		"CG" => 'Congo',
		"CD" => 'Congo (Democratic Republic of the Congo)',
		"KW" => 'Kuwait',
		"DE" => 'Germany',
		"HU" => 'Hungary',
		"MA" => 'Morocco',
		"MX" => 'Mexico',
		"UK" => 'United Kingdom',
		"TF" => 'Southern French regions and Interactica regions',
		"NO" => 'Norway',
		"AT" => 'Austria',
		"NE" => 'Niger',
		"IN" => 'India',
		"US" => 'United States',
		"JP" => 'Japan',
		"YE" => 'Yemen',
		"GR" => 'Greece',
		"AQ" => 'Antarctica',
		"AG" => 'Antigua and Barbuda',
		"AD" => 'Andorra',
		"ID" => 'Indonesia',
		"AO" => 'Angola',
		"AI" => 'Anguilla',
		"UY" => 'Uruguay',
		"UZ" => 'Uzbekistan',
		"UG" => 'Uganda',
		"UA" => 'Ukraine',
		"IR" => 'Iran',
		"IE" => 'Ireland',
		"IS" => 'Iceland',
		"IT" => 'Italy',
		"PG" => 'Papua New Guinea',
		"PY" => 'Paraguay',
		"BB" => 'Barbados',
		"PK" => 'Pakistan',
		"PW" => 'Palau',
		"BM" => 'Bermuda',
		"BN" => 'Brunei',
		"BE" => 'Belgium',
		"BG" => 'Bulgaria',
		"BD" => 'Bangladesh',
		"PA" => 'Panama',
		"BJ" => 'Boys',
		"BT" => 'Bhutan',
		"BW" => 'Botswana',
		"PR" => 'Puerto Rico',
		"BF" => 'Burkina Faso',
		"BI" => 'Burundi',
		"PL" => 'Poland',
		"BO" => 'Bolivia',
		"PF" => 'French Polynesia',
		"PE" => 'Peru',
		"BY" => 'Belarus',
		"BZ" => 'Belize',
		"TH" => 'Thailand',
		"TW" => 'Taiwan',
		"TM" => 'Turkmenistan',
		"TR" => 'Turkey',
		"TT" => 'Trinidad and Tobago',
		"TD" => 'Chad',
		"CL" => 'Chile',
		"TZ" => 'Tanzania',
		"TG" => 'Togo',
		"TV" => 'TUV',
		"TK" => 'Tokelau',
		"TO" => 'Tonga',
		"TN" => 'Tunisia',
		"TP" => 'East Timor (East Timor)',
		"JM" => 'Jamaica',
		"GM" => 'Gambia',
		"GI" => 'Gibraltar',
		"GL" => 'Greenland',
		"AN" => 'Netherlands Antilles',
		"PN" => 'Biscuit Islands',
		"BS" => 'Bahamas',
		"VG" => 'British Virgin Islands',
		"VI" => 'Virgin Islands, United States',
		"KM" => 'Comoros',
		"CC" => 'Cocos Islands (Killeen)',
		"MV" => 'Maldives',
		"TC" => 'Turks and Caicos Islands',
		"AS" => 'American Samoa',
		"SB" => 'Solomon Islands',
		"FO" => 'Fairo Islands',
		"UM" => 'United States Minorities',
		"FK" => 'Falkland Islands (Isalas Malvinas)',
		"FJ" => 'Fiji Islands',
		"KY" => 'Cayman Islands',
		"CK" => 'Cook Islands',
		"MH" => 'Marshall Islands',
		"MP" => 'Northern Mariana Islands',
		"CX" => 'Christmas Island',
		"BV" => 'Buffet Island',
		"IM" => 'Isle of Man',
		"NF" => 'Norfolk Island',
		"HM" => 'Heard Island and McDonald Islands',
		"CF" => 'Central African Republic',
		"CZ" => 'Czech Republic',
		"DO" => 'Dominican Republic',
		"ZA" => 'South Africa',
		"GT" => 'Guatemala',
		"GP" => 'Guadeloupe',
		"GU" => 'GUAM',
		"GE" => 'Georgia',
		"GS" => 'South Georgia and the South Sandwich Islands',
		"GY" => 'Gianna',
		"GF" => 'French Guiana',
		"DJ" => 'Djibouti',
		"JE" => 'jersey',
		"GG" => 'Guernsey',
		"VA" => 'Vatican State',
		"DM" => 'Dominica',
		"RW" => 'Rwanda',
		"RU" => 'Russia',
		"RO" => 'Romania',
		"RE" => 'Reunion',
		"ZM" => 'Zambia',
		"ZW" => 'Zimbabwe',
		"WS" => 'Samoa',
		"SM" => 'San Marino',
		"PM" => 'Saint Pierre and Miquelon',
		"VC" => 'Saint Vincent and Grenadines',
		"KN" => 'Saint Kitts and Nevis',
		"LC" => 'Saint Lucia',
		"SH" => 'St. Helena',
		"ST" => 'Sao Tome and Principe',
		"SJ" => 'Svalbard and Jan Mayn',
		"SK" => 'Slovakia',
		"SI" => 'Slovenia',
		"SG" => 'Singapore',
		"SZ" => 'Swaziland',
		"SY" => 'Syria',
		"SR" => 'Suriname',
		"CH" => 'Switzerland',
		"SL" => 'Sierra Leone',
		"LK" => 'Sri Lanka',
		"SC" => 'Seychelles',
		"RS" => 'Serbia',
		"TJ" => 'Tajikistan',
		"OM" => 'Oman',
		"GH" => 'Ghana',
		"GD" => 'Grenada',
		"GN" => 'Guinea',
		"GQ" => 'Equatorial Guinea',
		"GW" => 'Guinea-Bissau',
		"VU" => 'Vanuatu',
		"FR" => 'France',
		"VE" => 'Venezuela',
		"FI" => 'Finland',
		"VN" => 'Vietnam',
		"CY" => 'Cyprus',
		"QA" => 'Qatar',
		"KG" => 'Kyrgyzstan',
		"KZ" => 'Kazakhstan',
		"NC" => 'New Caledonia',
		"KH" => 'Cambodia',
		"HR" => 'Croatia',
		"CA" => 'Canada',
		"CU" => 'Cuba',
		"CI" => 'Côte d Ivoire (Ivory Coast)',
		"KR" => 'Korea',
		"KP" => 'North Korea',
		"CR" => 'Costa Rica',
		"CO" => 'Columbia',
		"KI" => 'Kiribati',
		"KE" => 'Kenya',
		"LV" => 'Latvia',
		"LA" => 'Laos',
		"LB" => 'Lebanon',
		"LI" => 'Liechtenstein',
		"LU" => 'Luxembourg',
		"LY" => 'Libya',
		"LR" => 'Liberia',
		"LT" => 'Lithuania',
		"LS" => 'Lesotho',
		"MQ" => 'Martinique',
		"MO" => 'Macau',
		"FM" => 'Micronesia',
		"MW" => 'Malawi',
		"MT" => 'Malta',
		"ML" => 'Male',
		"MY" => 'Malaysia',
		"YT" => 'Mayotte',
		"MG" => 'Madagascar',
		"EG" => 'Egypt',
		"MK" => 'Macedonia, the former Yugoslavia',
		"BH" => 'Kingdom of Bahrain',
		"MN" => 'Mongolia',
		"MR" => 'Mauritania',
		"MU" => 'Mauritius',
		"MZ" => 'Mozambique',
		"MD" => 'Moldova',
		"MC" => 'Monaco',
		"MS" => 'Montserrat',
		"ME" => 'Montenegro',
		"MM" => 'Myanmar',
		"NA" => 'Namibia',
		"NR" => 'Nauru',
		"NP" => 'Nepal',
		"NG" => 'Nigeria',
		"NI" => 'Nicaragua',
		"NU" => 'Niwa',
		"NZ" => 'New Zealand',
		"HT" => 'Haiti',
		"HN" => 'Honduras',
		"NL" => 'Netherlands',
		"HK" => 'Hong Kong SAR',
		"WF" => 'Wallis and Futuna'
	];
	public $countries = [
		'المملكة العربية السعودية',
		'إثيوبيا',
		'أذربيجان',
		'أرمينيا',
		'أروبا',
		'إريتريا',
		'أسبانيا',
		'أستراليا',
		'إستونيا',
		'إسرائيل',
		'أفغانستان',
		'إقليم المحيط الهندي البريطاني',
		'إكوادور',
		'الأرجنتين',
		'الأردن',
		'الإمارات العربية المتحدة',
		'ألبانيا',
		'البرازيل',
		'البرتغال',
		'البوسنة والهرسك',
		'الجابون',
		'الجزائر',
		'الدانمارك',
		'الرأس الأخضر',
		'السلطة الفلسطينية',
		'السلفادور',
		'السنغال',
		'السودان',
		'السويد',
		'الصومال',
		'الصين',
		'العراق',
		'الفلبين',
		'الكاميرون',
		'الكونغو',
		'الكونغو (جمهورية الكونغو الديمقراطية)',
		'الكويت',
		'ألمانيا',
		'المجر',
		'المغرب',
		'المكسيك',
		'المملكة المتحدة',
		'المناطق الفرنسية الجنوبية ومناطق انتراكتيكا',
		'النرويج',
		'النمسا',
		'النيجر',
		'الهند',
		'الولايات المتحدة',
		'اليابان',
		'اليمن',
		'اليونان',
		'أنتاركتيكا',
		'أنتيغوا وبربودا',
		'أندورا',
		'إندونيسيا',
		'أنغولا',
		'أنغويلا',
		'أوروجواي',
		'أوزبكستان',
		'أوغندا',
		'أوكرانيا',
		'إيران',
		'أيرلندا',
		'أيسلندا',
		'إيطاليا',
		'بابوا-غينيا الجديدة',
		'باراجواي',
		'باربادوس',
		'باكستان',
		'بالاو',
		'برمودا',
		'بروناي',
		'بلجيكا',
		'بلغاريا',
		'بنجلاديش',
		'بنما',
		'بنين',
		'بوتان',
		'بوتسوانا',
		'بورتو ريكو',
		'بوركينا فاسو',
		'بوروندي',
		'بولندا',
		'بوليفيا',
		'بولينزيا الفرنسية',
		'بيرو',
		'بيلاروس',
		'بيليز',
		'تايلاند',
		'تايوان',
		'تركمانستان',
		'تركيا',
		'ترينيداد وتوباجو',
		'تشاد',
		'تشيلي',
		'تنزانيا',
		'توجو',
		'توفالو',
		'توكيلاو',
		'تونجا',
		'تونس',
		'تيمور الشرقية (تيمور الشرقية)',
		'جامايكا',
		'جامبيا',
		'جبل طارق',
		'جرينلاند',
		'جزر الأنتيل الهولندية',
		'جزر البتكارين',
		'جزر البهاما',
		'جزر العذراء البريطانية',
		'جزر العذراء، الولايات المتحدة',
		'جزر القمر',
		'جزر الكوكوس (كيلين)',
		'جزر المالديف',
		'جزر تركس وكايكوس',
		'جزر ساموا الأمريكية',
		'جزر سولومون',
		'جزر فايرو',
		'جزر فرعية تابعة للولايات المتحدة',
		'جزر فوكلاند (أيزلاس مالفيناس)',
		'جزر فيجي',
		'جزر كايمان',
		'جزر كوك',
		'جزر مارشال',
		'جزر ماريانا الشمالية',
		'جزيرة الكريسماس',
		'جزيرة بوفيه',
		'جزيرة مان',
		'جزيرة نورفوك',
		'جزيرة هيرد وجزر ماكدونالد',
		'جمهورية أفريقيا الوسطى',
		'جمهورية التشيك',
		'جمهورية الدومينيكان',
		'جنوب أفريقيا',
		'جواتيمالا',
		'جواديلوب',
		'جوام',
		'جورجيا',
		'جورجيا الجنوبية وجزر ساندويتش الجنوبية',
		'جيانا',
		'جيانا الفرنسية',
		'جيبوتي',
		'جيرسي',
		'جيرنزي',
		'دولة الفاتيكان',
		'دومينيكا',
		'رواندا',
		'روسيا',
		'رومانيا',
		'ريونيون',
		'زامبيا',
		'زيمبابوي',
		'ساموا',
		'سان مارينو',
		'سانت بيير وميكولون',
		'سانت فينسنت وجرينادينز',
		'سانت كيتس ونيفيس',
		'سانت لوشيا',
		'سانت هيلينا',
		'ساوتوماي وبرينسيبا',
		'سفالبارد وجان ماين',
		'سلوفاكيا',
		'سلوفينيا',
		'سنغافورة',
		'سوازيلاند',
		'سوريا',
		'سورينام',
		'سويسرا',
		'سيراليون',
		'سيريلانكا',
		'سيشل',
		'صربيا',
		'طاجيكستان',
		'عمان',
		'غانا',
		'غرينادا',
		'غينيا',
		'غينيا الاستوائية',
		'غينيا بيساو',
		'فانواتو',
		'فرنسا',
		'فنزويلا',
		'فنلندا',
		'فيتنام',
		'قبرص',
		'قطر',
		'قيرقيزستان',
		'كازاخستان',
		'كاليدونيا الجديدة',
		'كامبوديا',
		'كرواتيا',
		'كندا',
		'كوبا',
		'كوت ديفوار (ساحل العاج)',
		'كوريا',
		'كوريا الشمالية',
		'كوستاريكا',
		'كولومبيا',
		'كيريباتي',
		'كينيا',
		'لاتفيا',
		'لاوس',
		'لبنان',
		'لختنشتاين',
		'لوكسمبورج',
		'ليبيا',
		'ليبيريا',
		'ليتوانيا',
		'ليسوتو',
		'مارتينيك',
		'ماكاو',
		'ماكرونيزيا',
		'مالاوي',
		'مالطا',
		'مالي',
		'ماليزيا',
		'مايوت',
		'مدغشقر',
		'مصر',
		'مقدونيا، جمهورية يوغوسلافيا السابقة',
		'مملكة البحرين',
		'منغوليا',
		'موريتانيا',
		'موريشيوس',
		'موزمبيق',
		'مولدوفا',
		'موناكو',
		'مونتسيرات',
		'مونتينيغرو',
		'ميانمار',
		'ناميبيا',
		'ناورو',
		'نيبال',
		'نيجيريا',
		'نيكاراجوا',
		'نيوا',
		'نيوزيلندا',
		'هايتي',
		'هندوراس',
		'هولندا',
		'هونغ كونغ SAR',
		'واليس وفوتونا'
	];
}