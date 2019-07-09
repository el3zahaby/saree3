<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class positionSlider extends Model{
    protected $guarded = ['id'];

    public $rules = [
        'name'   => 'required|max:150',
        'slug'  => 'required|max:1000',

    ];

}
