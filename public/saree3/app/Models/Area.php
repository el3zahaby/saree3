<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'name'   => 'required',
    ];

    public static $AreaTypes = [
        'Country',
        'State',
        'City'
    ];

    public function parent()
    {
        return $this->belongsTo(Area::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasmany(Area::class, 'parent_id');
    }


}
