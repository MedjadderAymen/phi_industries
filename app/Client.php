<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=[
        'company_name','phone_number',
        'email','address'
    ];
}
