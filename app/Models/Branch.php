<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'name'   => 'required',
        'user_id'   => 'required|exists:users,id',
		'section_id' => 'required|exists:sections,id',
		'area_id' => 'required|exists:areas,id',
		'address' => 'required|max:150',
		'body' => 'required|max:5000',
		'email' => 'required|email|max:150',
		'phone' => 'required|max:20',
		'status' => 'required|in:0,1',
		'image' => 'required|mimes:jpg,png,jpeg',
    ];

}
