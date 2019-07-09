<?php

namespace App\Models;

use App\BaseModel;

class Attachment extends BaseModel
{
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachable()
    {
        return $this->morphTo();
    }


}
