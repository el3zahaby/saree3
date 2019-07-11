<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    public function get_user(){
        return $this->hasOne('App\User','id','parent');
    }

    public static function valid_msg_html($msg){

    }

    public static function valid_url($msg){
        if ((filter_var($msg, FILTER_VALIDATE_URL ))) {
            $url = $msg;
            $urlDomain = parse_url($url)['host'];
            $myDomaun = request()->getHost();
            if ($urlDomain != $myDomaun) {
//                return '<a href="'.$msg.'" alt="'.$msg.'" title="'.$urlDomain.'">'.$msg.'</a>';
                return $msg;
            }
        }else{
            return $msg;
        }
    }
}
