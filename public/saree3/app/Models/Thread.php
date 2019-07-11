<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'body'   => 'required|max:10000',
        'title'   => 'required|max:150',
		'user_id' => 'required|exists:users,id',
		'section_id' => 'required|exists:thread_sections,id',
    ];


    public function attachments() {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ThreadSection() {
        return $this->belongsTo(threadSection::class);
    }

}
