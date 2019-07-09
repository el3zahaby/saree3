<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model {

    protected $fillable = [
        'title', 'body','images'
    ];

    public function slider ( ) {
		return $this->belongsTo(positionSlider::class);
    }
}
