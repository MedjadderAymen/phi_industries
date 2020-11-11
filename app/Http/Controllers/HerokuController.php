<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class HerokuController extends Controller
{
    public function set()
    {
        User::create([
            'name' => "medjadder aimen",
            'email' => "medjadder@gmail.com",
            'email_verified_at' => now(),
            'role' => "admin",
            'last_time_in' => now(),
            'password' => bcrypt("password"), // password
            'remember_token' => Str::random(10),
        ]);
    }

    public function send(Request $request){

        Mail::send('welcome',['phone number'=>"0698281556"],function (Message $message) {

            $message->to("aymen_medjader@hotmail.com");
            $message->from("uc3.application@gmail.com");
            $message->subject('reset ur passwrod');

        });

        return 'bien';

    }
}
