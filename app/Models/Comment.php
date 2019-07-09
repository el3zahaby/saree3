<?php

namespace App\Models;

use App\BaseModel;

class Comment extends BaseModel
{
    protected $guarded = ['id'];

    protected static $rules = [
        'name'   => 'required',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }




}
