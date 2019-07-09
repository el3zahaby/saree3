<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'body'   => 'required|max:10000',
        'name_and_type'   => 'required|max:150',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
