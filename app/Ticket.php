<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int|null user_id
 * @property mixed title
 * @property mixed content
 * @property mixed parent
 * @onUpdate:
 * @property  mixed room
 * @property mixed id
 */
class Ticket extends Model
{

    protected $fillable = [
        'title', 'content', 'parent',
    ];

    public function get_user(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function lastUpdate(){
        return $this->where('parent',0)->where('room',$this->id)->
        orWhere('id',$this->id)->orderBy('id', 'DESC')->first()->updated_at->diffForHumans();
    }

    public function lastAnswer(){
        return $this->where('parent',0)->where('room',$this->id)->
        orWhere('id',$this->id)->orderBy('id', 'DESC')->first()->get_user->name;
    }

    public function departmentName(){
        $string =  $this->title;
        $start  = '[';
        $end    = ']';


        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }


}
