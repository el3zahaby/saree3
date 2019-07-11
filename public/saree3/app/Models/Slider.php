<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'title'   => 'required|max:150',
        'body'   => 'required|max:5000',
		'slider_position' => "required|exists:position_sliders,id",
		'images'   => 'required|mimes:jpg,jpeg,png',

    ];
    
}
