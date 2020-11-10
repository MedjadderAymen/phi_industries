<?php

namespace App\Http\Controllers;

use App\Medication;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin/dashboard')->with('medications',Medication::all());
    }

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
