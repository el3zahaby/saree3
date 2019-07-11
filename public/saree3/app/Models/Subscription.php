<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'name'   => 'required',
    ];

    public function plan(){
        $this->belongsTo(Plan::class);
    }

}
