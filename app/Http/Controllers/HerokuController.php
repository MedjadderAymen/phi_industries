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
            'company' => "Phi Industries",
            'email' => "phi.industrie@gmail.com",
            'email_verified_at' => now(),
            'description' => "Fabrication des compléments alimentaires",
            'last_time_in' => now(),
            'password' => bcrypt("password"), // password
            'remember_token' => Str::random(10),
            'address' => "Cité benabdelmalek ramdane 245 Constantine",
            'rc' => "25/00-0071757B17",
            'nif' => "001725007175769",
            'ai' => "25016363111",
            'nis' => "001725010025169",
            'phone_number' => "+698281556",
        ]);

        return redirect(route('login'));
    }

    public function send(Request $request){

        Mail::send('welcome',['phone number'=>"0698281556"],function (Message $message) {

            $message->to("aymen_medjader@hotmail.com");
            $message->from("uc3.application@gmail.com");
            $message->subject('reset ur passwrod');

        });

        return 'bien';

    }

    public function conv(){

    }
}
