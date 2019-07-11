<?php

namespace App\Models;

use App\BaseModel;

class Complain extends BaseModel
{

    protected $guarded = ['id'];

    protected static $rules = [
        'name'   => 'required',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function complaint_type()
    {
        return $this->belongsTo(ComplainType::class, 'complain_type_id');
    }


}
