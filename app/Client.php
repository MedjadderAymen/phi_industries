<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=[
        'company_name','phone_number',
        'code','address','rc','ai','nif','nis','social_reason',
        'user_id'
    ];

    public function Invoice(){

        return $this->hasMany('App\Invoice');

    }

    public function Quote(){

        return $this->hasMany('App\Quote');

    }

    public function User(){

        return $this->belongsTo('App\User');

    }
}
