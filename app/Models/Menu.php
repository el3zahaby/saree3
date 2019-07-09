<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];

    public $rules = [
       'icon' => 'required|max:150',
       'title' => 'required|max:150',
       'url' => 'required|max:1000',
       'order' => 'required|numeric|max:99999999',
       'parent_id' => 'required|integer|max:99999999',
    ];

    protected $fillable = [
        'icon',
        'title',
        'url',
        'order',
        'parent_id'
    ];

}
