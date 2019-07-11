<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $guarded = ['id'];


	public $rules = [
		'user_id'   	=> 'required|exists:users,id',
		'section_id'   	=> 'required|exists:sections,id',
		'area_id'   	=> 'required|exists:areas,id',
		'attachment'  	=> 'required|mimes:jpg,jpeg,png',
		'name'   		=> 'required|max:150',
		'body'   		=> 'required|max:10000',
		'price'   		=> 'required|integer|max:999999999',
		'per'   		=> 'required|in:Hour,Service',
		'status'   		=> 'required|in:1,0',

	];

	public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }


}
