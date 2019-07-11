<?php

namespace App\Models;

use App\BaseModel;

class Role extends BaseModel
{
    protected $guarded = ['id'];

    protected static $rules = [
        'name'        => 'required|unique:roles,name',
        'permissions.*' => 'required|exists:permissions,id'
    ];

}
