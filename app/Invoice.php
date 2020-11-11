<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=[
        'client_id','to','phone_number','email','total','invoice_id',
        'user_id','discount','price_after_discount',
        'price_after_tva'
    ];

    public function Client(){

        return $this->belongsTo('App\Client');

    }

    public function User(){

        return $this->belongsTo('App\User');

    }

    public function Medications(){
        return $this->belongsToMany('App\Medication')->withPivot('quantity','total_price');
    }
}
