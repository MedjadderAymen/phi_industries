<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Medication;
use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;
use Session;

class InvoiceController extends Controller
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
        return view('Admin.invoice.index')->with("invoices",Invoice::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=Client::all();
        $medications=Medication::all();

        if (count($clients)==0 ){

            Session::flash('info','Ajouter des clients');

            return redirect(route('client.create'));

        }

        elseif (count($medications)==0){

            Session::flash('info','Ajouter des medicaments');

            return redirect(route('create'));

        }

        return view('Admin.invoice.create')->with("clients",$clients)->with("medications",$medications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $invoice=Invoice::create([

            'client_id'=>$request->client_id,
            'user_id'=>Auth::id(),
            'invoice_id'=>uniqid(),
            'to'=>$request->to,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'discount'=>$request->discount,
            'total'=>0.0,
            'price_after_discount'=>0.0,
            'price_after_tva'=>0.0,

        ]);

        $total=0.0;

        for ($i=0; $i< count($request->medic); $i++){

            $medic=Medication::find($request->medic[$i]);

            $invoice->Medications()->attach($request->medic[$i],['quantity' => $request->quantity[$i],'total_price'=>$request->quantity[$i]*$medic->price]);

            $total+=$request->quantity[$i]*$medic->price;

        }

        $invoice->total=$total;

        $invoice->price_after_tva=$total + ($total * (10 / 100));

        $invoice->price_after_discount = $total - ($invoice->price_after_tva * ($request->discount / 100));

        $invoice->save();

        Session::flash('success','Fcture ete bien ajouté');

        return redirect(route('invoice.show',["id"=>$invoice->id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice, $id)
    {
        $invoice=Invoice::find($id)->with('client','user','medications')->first();

        return view('Admin.invoice.detail')->with("invoice",$invoice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function InvoicePrint($id){

        $invoice=Invoice::find($id)->with('client','user','medications')->first();

        return view('Admin.invoice.invoice-print')->with("invoice",$invoice);

    }
}
