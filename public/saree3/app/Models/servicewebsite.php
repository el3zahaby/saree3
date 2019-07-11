<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servicewebsite extends Model
{
 
    protected $guarded = ['id'];

    public $rules = [
		'icon' 	=> 'required|max:150',
		'title' 	=> 'required|max:150',
		'body' 	=> 'required|max:5000',
    ];

    protected $fillable = [
        'icon',
        'title',
        'body',
    ];

}
