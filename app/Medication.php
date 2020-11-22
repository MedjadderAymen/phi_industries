<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable=[
        'name','plot','name_plot','image','description','quantity','user_id',
        'modified_by','price','ppc','shp','ddp'
    ];


    public function User(){

        return $this->belongsTo('App\User');

    }

    public function Invoices(){

        return $this->belongsToMany('App\Invoice');
        
    }

}
