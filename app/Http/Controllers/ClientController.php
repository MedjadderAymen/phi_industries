<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;

class ClientController extends Controller
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
        $user=User::with(['clients.invoice'=>function($q){$q->where('user_id',Auth::id());}])->find(Auth::id());

        return view("Admin.client.index")->with("clients",$user->clients);
    }


    public function create()
    {
        return view('Admin.client.create');
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
            'company_name' => "required|string",
            'phone_number' => "required",
            'code' => "required|string|unique:clients",
            'address' => "required|string",
            'rc' => "required|string",
            'nis' => "required|string",
            'ai' => "required|string",
            'nif' => "required|string",
            'social_reason' => "required|string",
        ]);

        if ($data->fails()) {

            Session::flash('error','Vérifier les données SVP!');
            return redirect()->back();

        }

            Client::create([
                'user_id'=>Auth::id(),
                'company_name' => $request->company_name,
                'phone_number' => $request->phone_number,
                'code' => $request->code,
                'address' => $request->address,
                'rc' => $request->rc,
                'ai' => $request->ai,
                'nif' => $request->nif,
                'nis' => $request->nis,
                'social_reason' => $request->social_reason,
            ]);

            return redirect('clients');

    }

    public function show($id)
    {
        $client=Client::with(['invoice'=>function($q){$q->where('user_id',Auth::id());}])->find($id);

        return view('Admin.client.detail')->with("client",$client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client,$id)
    {
        return view('Admin.client.update')->with("client",Client::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, $id)
    {

        $data = Validator::make($request->all(), [
            'company_name' => "required|string",
            'phone_number' => "required",
            'code' => "required|string|unique:clients",
            'address' => "required|string",
            'rc' => "required|string",
            'nis' => "required|string",
            'ai' => "required|string",
            'nif' => "required|string",
            'social_reason' => "required|string",
        ]);

        if ($data->fails()) {

            Session::flash('error','Vérifier les données SVP!');
            return redirect()->back();

        }

        $client=Client::find($id);

        $client->company_name=$request->company_name;
        $client->phone_number=$request->phone_number;
        $client->address=$request->address;
        $client->code=$request->code;
        $client->rc=$request->rc;
        $client->nif=$request->nif;
        $client->nis=$request->nis;
        $client->ai=$request->ai;
        $client->social_reason=$request->social_reason;

        $client->save();

        Session::flash('success','Client modifié avec succès');

        return redirect('clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function delete($id){

        $client=Client::find($id);

        $client->delete();

        Session::flash('success','Client supprimé avec succès');

        return redirect('clients');

    }

}
