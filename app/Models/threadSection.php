<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class threadSection extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'slug',
        'body',
        'status',
        'image'
    ];
    public $rules = [
        'title.*'   => 'required|max:150',
        'body.*'   => 'required|max:10000',
        'status'   => 'required|in:0,1',
        'images'   => 'required|mimes:png,jpg,jpeg',
    ];
    protected $casts = [
        'title' => 'array',
        'body' => 'array',
    ];

    public function getTitleTranslatedAttribute()
    {
        return $this->title[app()->getLocale()];
    }
}
