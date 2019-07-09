<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'status',
        'cover',
        'position',
    ];

    protected $casts = [
        'title' => 'array',
        'body' => 'array',
    ];

//    function getTitleAttribute()
//    {
//        return json_decode($this->attributes['title'], true)[app()->getLocale()];
//    }
//
//    function getBodyAttribute()
//    {
//        return json_decode($this->attributes['body'], true)[app()->getLocale()];
//    }

    public $rules = [
        'title.*'   => 'required|max:250',
        'slug'   => 'required|max:150',
        'body.*'   => 'required|max:10000',
		'status'  => 'required|in:0,1',
		'position'  => 'required|max:150',
		'cover'  => 'required|mimes:jpeg,png,jpg'
    ];

}
