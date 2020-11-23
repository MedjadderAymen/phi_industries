<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company', 'email', 'password','last_time_in',
        'description', 'address', 'rc','nif',
        'ai','nis',"phone_number"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_time_in' => 'datetime',
    ];

    public function Medication(){

        return $this->hasMany('App\Medication');

    }

    public function Invoice(){

        return $this->hasMany('App\Invoice');

    }

    public function Quote(){

        return $this->hasMany('App\Quote');

    }

    public function Clients(){

        return $this->hasMany('App\Client');

    }
}
