<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Admin.client.index")->with("clients",Client::all());
    }


    public function create()
    {
        echo'nkbi';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 'ok';
    }

    public function show($id)
    {
        return view('Admin.client.detail')->with("client",Client::find($id));
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
            "company_name" => "required",
            "address" => "required",
            "phone_number" => "required",
            "email" => "required",
        ]);

        if ($data->fails()) {

            Session::flash('error','Vérifier les données SVP!');
            return redirect()->back();

        }

        $client=Client::find($id);

        $client->company_name=$request->company_name;
        $client->phone_number=$request->phone_number;
        $client->address=$request->address;
        $client->email=$request->email;

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
