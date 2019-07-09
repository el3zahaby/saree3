<?php

namespace App\Models;

use App\BaseModel;

class Newsletter extends BaseModel
{
    protected $guarded = ['id'];

    protected static $rules = [
        'name'   => 'required',
    ];

}
