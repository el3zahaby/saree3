<?php

namespace App\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Model;

class ComplainType extends Model
{
    protected $guarded = ['id'];
    public $rules = [
        'name'   => 'required|max:150',
        'description'   => 'required|max:5000',
    ];

    public function complains()
    {
        return $this->hasMany(Complain::class);
    }

}
