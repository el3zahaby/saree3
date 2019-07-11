<?php

namespace App\Models;

use App\BaseModel;

class Advertisement extends BaseModel
{
    protected $guarded = ['id'];

    protected static $rules = [
        'name'   => 'required',
    ];

}
