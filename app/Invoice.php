<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=[
        'client_id','to','phone_number','email','total','invoice_id'
    ];

    public function Client(){

        return $this->belongsTo('App\Client');

    }

    public function User(){

        return $this->belongsTo('App\User');

    }

    public function Medication(){
        return $this->belongsToMany('App\Medication');
    }
}
