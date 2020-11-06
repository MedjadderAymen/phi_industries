<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable=[
        'name','image','description','quantity','user_id','modified_by'
    ];

    public function User(){

        return $this->belongsTo('App\User');

    }

}
