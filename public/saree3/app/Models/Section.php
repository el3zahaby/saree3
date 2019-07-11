<?php

namespace App\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'title.*'   => 'required|max:150',
        'description.*'   => 'required|max:5000',
        'slug'   => 'required|max:190',
        'order'   => 'required|numeric|max:9999999999',
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];

    public function getTitleTranslatedAttribute()
    {
        return $this->title[app()->getLocale()];
    }


    public function photos() {
        return $this->morphMany(Photo::class, 'photable', 'model_type', 'model_id');
    }

    public function parent()
    {
        return $this->belongsTo(Section::class, 'parent_id');
    }

}
