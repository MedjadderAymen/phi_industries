<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
use Validator;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.user.index')->with("users",User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'company' => "required|string",
            'description' => "required|string",
            'phone_number' => "required",
            'email' => "required|string|email|unique:users",
            'address' => "required|string",
            'nif' => "required|string",
            'nis' => "required|string",
            'ai' => "required|string",
            'rc' => "required|string",
            'password' => "required|string|min:8",
        ]);

        if ($data->fails()) {

            Session::flash('error','Vérifier les données SVP!');
            return redirect()->back();

        }

        User::create([
            'company' => $request->company,
            'description' => $request->description,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'nif' => $request->nif,
            'nis' => $request->nis,
            'ai' => $request->ai,
            'rc' => $request->rc,
            'password' => bcrypt($request->password),
        ]);

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.user.update')->with("user",User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Validator::make($request->all(), [
            'company' => "required|string",
            'description' => "required|string",
            'phone_number' => "required",
            'email' => "required|string",
            'address' => "required|string",
            'nif' => "required|string",
            'nis' => "required|string",
            'ai' => "required|string",
            'rc' => "required|string",
        ]);

        if ($data->fails()) {

            Session::flash('error','Vérifier les données SVP!');
            return redirect()->back();

        }

        $user=User::find($id);


        $user->company = $request->company;
        $user->description = $request->description;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->nif = $request->nif;
        $user->nis = $request->nis;
        $user->ai = $request->ai;
        $user->rc = $request->rc;

        if ($request->password!=null){

            $user->password = bcrypt($request->password);

        }

        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
