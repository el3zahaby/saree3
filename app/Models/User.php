<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $attributes = [
        'sell' => 0,
    ];

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


    public function rules($method, $id=null)
    {
        switch ($method) {
            case 'POST':
                {
                    return [
                        'name'     => ['required', 'string', 'max:255'],
                        'username' => 'required|string|max:255',
                        'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'password' => 'required|same:confirm-password',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name'     => ['required', 'string', 'max:255'],
                        'username' => 'required|string|max:255',
                        'email'    => 'required|email|unique:users,email,' . $id,
                    ];
                }

        }

    }
}
