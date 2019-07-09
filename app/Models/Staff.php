<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Staff extends Authenticatable
{
    use Notifiable, HasRoles;
    protected $guard_name = 'staff';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'email_verified_at',
        'last_login_at',
        'last_login_ip',
    ];

    public function setPasswordAttribute( $value ) {
        if ($value)
            if (\Hash::needsRehash($value))
                $value = \Hash::make($value);
        $this->attributes['password'] = $value;
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

}
