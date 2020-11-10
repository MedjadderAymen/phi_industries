<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HerokuController extends Controller
{
    public function set()
    {
        User::create([
            'name' => "medjadder aimen",
            'email' => "medajdder@gmail.com",
            'email_verified_at' => now(),
            'role' => "admin",
            'last_time_in' => now(),
            'password' => bcrypt("password"), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
