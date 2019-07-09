<?php

if (! function_exists('backend_url')) {
    /**
     * Get admin url.
     *
     * @param  string $uri
     * @return string
     */
    function backend_url($uri)
    {
        return url('/backend/' . $uri);
    }
}

if(!function_exists('isActive')) {
    /**
     * Determine the nav if it is the current route.
     *
     */
    function isActive($nav) {
        return \Route::currentRouteName() == $nav ? 'active' : '';
    }
}

if(!function_exists('getallmenu')) {
    /**
     * Determine the nav if it is the current route.
     *
     */
    function getallmenu() {
        return \DB::table('menus')->get();
    }
}

if(!function_exists('getparentmenu')) {
    /**
     * Determine the nav if it is the current route.
     *
     */
    function getparentmenu() {
        return \DB::table('menus')
        ->where('parent_id','=',null)
        ->orderBy('order', 'asc')   
        ->get();
    }
}

if(!function_exists('getsubmenu')) {
    /**
     * Determine the nav if it is the current route.
     *
     */
    function getsubmenu($id) {
        return \DB::table('menus')
        ->where('parent_id','=',$id)   
        ->get();
    }
}



if (!function_exists('setting')) {
    /**
     * @param null $settingname
     * @return string
     */
    function setting($settingname)
    {
        $value = \App\Setting::where('set_name', $settingname)->first()->value;
        return $value ?? 'Not Found';
    }
}
if (!function_exists('get_slider')) {
    /**
     * @param null $settingname
     * @return string
     */
    function get_slider($slug,$pos) {
        return DB::table('sliders')
            ->join('position_sliders', 'sliders.slider_position', '=', 'position_sliders.id')
            ->whereRaw("(position_sliders.slug = ? AND sliders.slider_position = ?)", [$slug, $pos])
            ->get();
    }
}



if (!function_exists('listLangCodes')) {
    /**
     * @return array
     */
    function listLangCodes()
    {
        return [
            'ar' => 'العربية',
            'en' => 'English'
        ];
    }
}
if (!function_exists('status')) {
    /**
     * @return array
     */
    function status()
    {
        return [
            '1' => 'مفتوح',
            '0' => 'مغلق'
        ];
    }
}
if (!function_exists('listModel')) {
    /**
     * @return array
     */
     function listModel($model, $name = 'name'){
         return $model::get()->pluck($name,'id');
    }
}
if (!function_exists('SendSms')) {
    /**
     * @param $mobile
     * @param $message
     * @return bool|string
     */
    function SendSms($mobile, $message) {
        $url = 'http://www.smsapril.com/api.php?' . http_build_query(array(
                'comm'    => "sendsms",
                'user'    => env('SMS_USER'),
                'pass'    => env('SMS_PASS'),
                'to'      => $mobile,
                'message' => $message,
                'sender'  => env('SMS_SENDER'),
            ));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $content = curl_exec($ch);
        return $content;
    }
}

if (!function_exists('getLang')) {
    /**
     * @return string
     */
    function getLang()
    {
        return app()->getLocale();
    }
}
if (!function_exists('distance')) {
    /**
     * @param $lat1
     * @param $lon1
     * @param $lat2
     * @param $lon2
     * @param $unit
     * @param $round
     * @return float
     */
    function distance($lat1, $lon1, $lat2, $lon2, $unit, $round)
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return round(($miles * 1.609344), $round);
        } else if ($unit == "N") {
            return round(($miles * 0.8684), $round);
        } else { // defult kilometer
            return round(($miles * 1.609344), $round);
        }
    }
}


function getMimeType($filename){

    $finfo = finfo_open(FILEINFO_MIME_TYPE);

    return finfo_file($finfo, $filename);
}



function ftype($mimeType) {

    return substr($mimeType, 0, strrpos( $mimeType, '/'));
}



