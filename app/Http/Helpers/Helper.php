<?php


    ////////////////////////////////////////////////////////////////////
    //                                                                 //
    //                     @ HELPER FILE @                             //
    //                   Version 1.0 By Ayoub                          //
    //                                                                 //
    ////////////////////////////////////////////////////////////////////




/**
 * Fumction For Admin Url
 **/


if (!function_exists('aurl')) {
    function aurl ($url = null) {
        return url('admin/'.$url);
    }
}


/**
 * Fumction For user
 **/
if (!function_exists('user')) {
    function user () {
        return Auth()->guard()->user();
    }
}



if (!function_exists('DateNowArabic')) {
    function DateNowArabic() {
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        $your_date = date('y-m-d'); // The Current Date
        $en_month = date("M", strtotime($your_date));
        foreach ($months as $en => $ar) {
            if ($en == $en_month) { $ar_month = $ar; }
        }

        $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
        $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
        $ar_day_format = date('D'); // The Current Day
        $ar_day = str_replace($find, $replace, $ar_day_format);

        header('Content-Type: text/html; charset=utf-8');
        $standard = array("0","1","2","3","4","5","6","7","8","9");
        $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
        $current_date = $ar_day.' '.date('d').' / '.$ar_month.' / '.date('Y');
        $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

        return $arabic_date;
    }
}


if (!function_exists('UserAt')) {
    function UserAt($time) {
        $months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
        $days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
        $am_pm = ['AM' => 'صباحاً', 'PM' => 'مساءً'];

        $day = \Carbon\Carbon::parse($time)->day;
        $month = $months[\Carbon\Carbon::parse($time)->format('M')];
        $am_pm = $am_pm[\Carbon\Carbon::parse($time)->format('A')];
        $year = \Carbon\Carbon::parse($time)->year;

        $date = $day . ' ' . $month . ' ' .$year ;
        $numbers_ar = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
        $numbers_en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($numbers_en, $numbers_ar, $date);
    }
}


if (!function_exists('settings')) {
    function settings() {

        /* Get All Products : */
             $products = DB::table('products')
             ->join('sections', 'products.section_id', '=', 'sections.id')
             ->join('users', 'products.user_id', '=', 'users.id')
             ->select(    'products.id as products_id',
                          'products.attachments as products_images',
                          'products.name_and_type as products_name',
                          'products.body as products_desc',
                          'sections.title as products_category',
                          'products.price as products_price',
                          'users.name as user_name',
                          'users.image as user_image',
                          'users.slug as user_slug',
                          'products.slug as slug')
             ->where('products.status', '=' ,1)
             ->paginate(12);


             /* Get All Sections */
             $sections = DB::table('sections')
             ->select(
                     'sections.id as section_id',
                     'sections.parent_id  as section_parent',
                     'sections.title as section_title',
                     'sections.order as section_order'
             )
             ->get();

             // get all prent section
             $pr_section = DB::table('sections')
             ->select(
                     'sections.id as section_id',
                     'sections.title as section_title',
                     'sections.order as section_order'
             )
             ->where('sections.parent_id','=',null)
             ->get();

             $count = count($pr_section);
             $t_second = [];
             //get second section
             for ($i=0 ; $i < $count ; $i++ ) {
                 $second_section = DB::table('sections')
                 ->select(
                         'sections.id as section_id',
                         'sections.title as section_title',
                         'sections.slug as section_url',
                         'sections.order as section_order'
                 )
                 ->where('sections.parent_id','=',$pr_section[$i]->section_id )
                 ->get();

                 $t_second[] = json_encode($second_section);
             }

             // get Logo of Website :
             $logo = DB::table('settings')
             ->select('value')
             ->where('set_name','=','logo')
             ->first();

             $card = \Cart::class;
             $webservices    = get_all_webservices();

            // dd($card::content()->count());
           //$card::remove("370d08585360f5c568b18d1f2e4ca1df");

             return ['logo' => $logo->value,'products'=>$products ,'sections' => $sections,'parent_sec' => $pr_section , 'second_sections' => $t_second , 'card' => $card,'webservices'=>$webservices];
    }
}

if (!function_exists('check_sub_section')) {
    function check_sub_section($id) {
            $second_section = DB::table('sections')
                ->select(
                    'sections.id as section_id',
                    'sections.title as section_title',
                    'sections.slug as section_url',
                    'sections.order as section_order'
                )
                ->where('sections.parent_id', '=', $id)
                ->get();

            return $second_section;
    }
}
if (!function_exists('get_service_by_slug')) {
    function get_service_by_slug ($slug) {
        return DB::table("services")
            ->join('sections', 'services.section_id', '=', 'sections.id')
            ->join('users', 'services.user_id', '=', 'users.id')
            ->select(    'services.id as services_id',
                'services.attachment as services_image',
                'services.name as services_name',
                'services.body as services_desc',
                'services.price',
                'services.slug',
                'services.created_at',
                'users.name as user_name',
                'users.id as user_id',
                'users.image as userimage',
                'users.job as userjob',
                'sections.title as section_name')
            ->where('services.slug','=',$slug)->first();
    }
}
if (!function_exists('ip_visitor_country')) {
    function ip_visitor_country() {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        $country  = "Unknown";

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $ip_data_in = curl_exec($ch); // string
        curl_close($ch);

        $ip_data = json_decode($ip_data_in,true);
        $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

        if($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }

        return 'IP: '.$ip.' # Country: '.$country;
    }
}

if (!function_exists('get_country_city')) {
    function get_country_city($ip)
    {
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));
        if ($query && $query['status'] == 'success') {
            return json_encode(['country' => $query['country'] , 'city' => $query['city'] ]);
        } else {
            return json_encode(['country' => '404' , 'city' => '404' ]);
        }
    }

        //array (
        //'status'      => 'success',
        //'country'     => 'COUNTRY',
        //'countryCode' => 'COUNTRY CODE',
        //'region'      => 'REGION CODE',
        //'regionName'  => 'REGION NAME',
        //'city'        => 'CITY',
        //'zip'         => ZIP CODE,
        //'lat'         => LATITUDE,
        //'lon'         => LONGITUDE,
        //'timezone'    => 'TIME ZONE',
        //'isp'         => 'ISP NAME',
        //'org'         => 'ORGANIZATION NAME',
        //'as'          => 'AS NUMBER / NAME',
        //'query'       => 'IP ADDRESS USED FOR QUERY',
        //)
}



if (!function_exists('check_name_section')) {
    function check_name_section($id)
    {
        $section = DB::table('sections')
            ->select(
                'sections.title as section_name'
            )
            ->where('sections.id', '=', $id)
            ->first();

        return json_decode($section->section_name)->ar;

    }
}
if (!function_exists('goToHomePage')) {
    function goToHomePage()
    {

        return redirect('/home');

    }
}

if (!function_exists('getAllCountry')) {
    function getAllCountry() {
       return DB::table('areas')
           ->where('parent_id','=',null)
            ->get();
    }
}


if (!function_exists('getCityOfCountry')) {
    function getCityOfCountry($id) {
        return DB::table('areas')
            ->where('parent_id','=',$id)
            ->get();
    }
}


if (!function_exists('get_img')) {
    function get_img($products) {
        return json_decode($products->products_images)[0]->img;
    }
}

if (!function_exists('get_imgs')) {
    function get_imgs($products) {
        return json_decode($products->products_images);
    }
}

if (!function_exists('get_type_trans')) {
    function get_type_trans($num) {
        $trans = ['مجاني' , 'حسب الموقع'];
        return $trans[$num - 1] ;
    }
}



if (!function_exists('get_services_imgs')) {
    function get_services_imgs($services) {
        return json_decode($services->services_image);
    }
}


/*
  * This function For Get All Services
  * @version 1.0
*/
if (!function_exists('get_allservices')) {
    function get_allservices () {
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
        ->paginate(12);
        return $services;
    }
}


/*
  * This function For Get All Services
  * @version 1.0
*/
if (!function_exists('get_all_products')) {
	function get_all_products () {
		return DB::table('products')
			->join('sections', 'products.section_id', '=', 'sections.id')
			->join('users', 'products.user_id', '=', 'users.id')
			->select('products.id as products_id',
				'products.slug as slug',
				'products.attachments as products_images',
				'products.name_and_type as products_name',
				'products.body as products_desc',
				'sections.title as products_category',
				'products.price as products_price',
				'products.trans as trans',
				'products.created_at as date_created',
				'users.name as user_name',
				'users.image as user_image',
				'users.description as user_desc',
				'users.country as country')->paginate(12);
	}
}
/*
  * This function For Get All Services
  * @version 1.0
*/
if (!function_exists('get_services_of_user')) {
    function get_services_of_user ($id) {
               /* get Al Services for me */
               return DB::table('services')
               ->join('sections', 'services.section_id', '=', 'sections.id')
               ->join('users', 'services.user_id', '=', 'users.id')
               ->select(    'services.id as services_id',
                'services.attachment as services_image',
                'services.name as services_name',
                'services.body as services_desc',
                'services.price',
                'services.slug',
                'users.name as user_name',
                'users.image as userimage',
                'sections.title as section_name')
               ->where('user_id','=',$id)
               ->paginate(12);
    }
}

/*
  * This function For Get All Services
  * @version 1.0
*/
if (!function_exists('serviceimgtag')) {
    function serviceimgtag () {
        //echo <img src="{{url("uploads/services/".get_services_imgs($value)[0]->img)}}" alt="service-image">;
    }
}



/*
  * This function For Get All Services
  * @version 1.0
*/
if (!function_exists('get_page_pos')) {
    function get_page_pos ($pos) {
        $page = DB::table('pages')
        ->where('position','=',$pos)
        ->get();

        return $page;

    }
}




/*
  * This function For Get All Services
  * @version 1.0
*/
if (!function_exists('get_pages')) {
    function get_pages () {
        $page = DB::table('pages')
        ->get();
        return $page;

    }
}


/*
  * This function For Get All Webservices
  * @version 1.0
*/
if (!function_exists('get_all_webservices')) {
    function get_all_webservices() {
        $webservices = DB::table('servicewebsites')
        ->get();
        return $webservices;

    }
}

/*
  * This function For Get All Services
  * @version 1.0
*/
if (!function_exists('get_adminpath')) {
    function get_adminpath () {
        $adminpath = DB::table('settings')
        ->get();
        return $adminpath[7]->value;

    }
}

/*
  * This function For Get All Forums
  * @version 1.0
*/
if (!function_exists('get_all_forums')) {
    function get_all_forums () {
        $forums = DB::table('threads')
            ->join('sections', 'threads.section_id', '=', 'sections.id')
            ->join('users', 'threads.user_id', '=', 'users.id')
            ->select(    'threads.id as threads_id',
                        'threads.title as title',
                        'threads.slug as threads_slug',
                        'threads.created_at as threads_date',
                        'users.name as username',
                        'users.image as userimage',
                        'sections.title as section'
                )
            ->paginate(12);

        return $forums;
    }
}
/*
  * This function For Get Forum By Slug
  * @version 1.0
*/
if (!function_exists('get_forum_by_slug')) {
    function get_forum_by_slug ($slug) {
        $forum = DB::table('threads')
            ->join('sections', 'threads.section_id', '=', 'sections.id')
            ->join('users', 'threads.user_id', '=', 'users.id')
            ->select(    'threads.id as threads_id',
                'threads.title as title',
                'threads.slug as threads_slug',
                'threads.created_at as threads_date',
                'users.name as username',
                'users.image as userimage',
                'sections.title as section'
            )
            ->where('threads.slug','=',$slug)
            ->first();

        return $forum;
    }
}

/*
  * This function For Get Forum By Slug
  * @version 1.0
*/
if (!function_exists('get_all_forum_sections')) {
    function get_all_forum_sections() {
        $sections = DB::table('thread_sections')
            ->get();
        return $sections;
    }
}

