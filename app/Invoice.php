<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=[
        'client_id','to','phone_number','email','total_ht','invoice_id',
        'user_id','discount','total_to_pay',
        'total_ppc','tva','total_ttc'
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
