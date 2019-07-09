<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'name'   => 'required',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function photable()
    {
        return $this->morphTo();
    }


}
