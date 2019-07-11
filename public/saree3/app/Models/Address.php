<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'name'   => 'required',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
