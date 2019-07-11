<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed get_last_message
 */
class rooms extends Model
{
     public function get_user_info_child(){
       
             return $this->hasOne('App\User','id','child');
      
     }
      public function get_user_info_parent(){
       
             return $this->hasOne('App\User','id','parent');
      
     }

     public function get_last_message(){
        return $this->hasMany('App\messages','roomid','id');
    }

    public function get_last_message_by_type()
    {
        if (isset($this->get_last_message->last()->message)){
            if ((filter_var($this->get_last_message->last()->message, FILTER_VALIDATE_URL))) {
                $url = $this->get_last_message->last()->message;
                $urlDomain = parse_url($url)['host'];

                $myDomaun = request()->getHost();
                if ($urlDomain == $myDomaun) {
                    return "File";
                }else if ($urlDomain == 'maps.google.com'){
                    return "Location Map";
                } else {
                    return "Url:" . $url;
                }
            } else {
                return $this->get_last_message->last()->message;
            }
        }
    }
}
