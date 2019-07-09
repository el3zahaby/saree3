<?php

namespace App\Models;

use App\BaseModel;

class Order extends BaseModel
{
    protected $guarded = ['id'];

    protected static $rules = [
        'name'   => 'required',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
