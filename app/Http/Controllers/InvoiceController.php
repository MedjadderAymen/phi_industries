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

        return view('Admin.invoice.index')->with("invoices",Auth::user()->invoice);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=Auth::user()->clients;
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

        try{

            $invoice=Invoice::create([

                'client_id'=>$request->client_id,
                'user_id'=>Auth::id(),
                'to'=>$request->to,
                'phone_number'=>$request->phone_number,
                'email'=>$request->email,
                'discount'=>$request->discount,

            ]);

            $total_ht=0.0;
            $total_ppc=0.0;

            for ($i=0; $i< count($request->medic); $i++){

                $medic=Medication::find($request->medic[$i]);

                $invoice->Medications()->attach($request->medic[$i],
                    ['quantity' => $request->quantity[$i],
                        'total_price'=>$request->quantity[$i]*$medic->price]);

                $total_ht+=$request->quantity[$i]*$medic->price;
                $total_ppc+=$request->quantity[$i]*$medic->ppc;

                $medic->quantity-=$request->quantity[$i];
                $medic->name_plot=$medic->name.', '.$medic->plot.', qte: '.$medic->quantity;

                $medic->save();

            }

            $invoice->total_ht=$total_ht;
            $invoice->total_ppc=$total_ppc;
            $invoice->tva=$total_ht*0.19;

            $invoice->total_ttc=$total_ht + $invoice->tva;

            $invoice->total_to_pay = $invoice->total_ttc - (($invoice->total_ttc * $request->discount) / 100);

            $invoice->invoice_id='F'.$invoice->id;

            $invoice->save();

            Session::flash('success','Fcture ete bien ajouté');

            return redirect(route('invoice.show',["id"=>$invoice->id]));

        }catch (\Exception $exception){

            Session::flash('error','Erreur d\'ajout');
            return redirect(route('/invoices'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice, $id)
    {
        $invoice=Invoice::with('client','user','medications')->find($id);

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
