<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
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
        return view('Admin/dashboard')
            ->with('medications',Medication::all())
            ->with('clients',Client::all())
            ->with('invoices',Invoice::all());
    }
}
