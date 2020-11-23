<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Medication;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class QuoteController extends Controller
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

        return view('Admin.quote.index')->with("quotes", Auth::user()->quote);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Auth::user()->clients;
        $medications = Medication::all();

        if (count($clients) == 0) {

            Session::flash('info', 'Ajouter des clients');

            return redirect(route('client.create'));

        } elseif (count($medications) == 0) {

            Session::flash('info', 'Ajouter des medicaments');

            return redirect(route('create'));

        }

        return view('Admin.quote.create')->with("clients", $clients)->with("medications", $medications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $quote = Quote::create([

                'client_id' => $request->client_id,
                'user_id' => Auth::id(),
                'to' => $request->to,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'discount' => $request->discount,

            ]);

            $total_ht = 0.0;
            $total_ppc = 0.0;

            for ($i = 0; $i < count($request->medic); $i++) {

                $medic = Medication::find($request->medic[$i]);

                $quote->Medications()->attach($request->medic[$i],
                    ['quantity' => $request->quantity[$i],
                        'total_price' => $request->quantity[$i] * $medic->price]);

                $total_ht += $request->quantity[$i] * $medic->price;
                $total_ppc += $request->quantity[$i] * $medic->ppc;

                //$medic->quantity -= $request->quantity[$i];
                //$medic->name_plot = $medic->name . ', ' . $medic->plot . ', qte: ' . $medic->quantity;

                $medic->save();

            }

            $quote->total_ht = $total_ht;
            $quote->total_ppc = $total_ppc;
            $quote->tva = $total_ht * 0.19;

            $quote->total_ttc = $total_ht + $quote->tva;

            $quote->total_to_pay = $quote->total_ttc - (($quote->total_ttc * $request->discount) / 100);

            $quote->quote_id = 'D' . $quote->id;

            $quote->save();

            Session::flash('success', 'Fcture ete bien ajouté');

            return redirect(route('quote.show', ["id" => $quote->id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote, $id)
    {
        $quote = Quote::with('client', 'user', 'medications')->find($id);

        return view('Admin.quote.detail')->with("quote", $quote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Invoice $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }

    public function QuotePrint($id)
    {

        $quote = Quote::find($id)->with('client', 'user', 'medications')->first();

        return view('Admin.quote.quote-print')->with("quote", $quote);


    }

    public function quoteTransfer($id)
    {

        $quote = Quote::find($id);

        try{

            $invoice=Invoice::create([

                'client_id'=>$quote->client_id,
                'user_id'=>Auth::id(),
                'to'=>$quote->to,
                'phone_number'=>$quote->phone_number,
                'email'=>$quote->email,
                'discount'=>$quote->discount,

            ]);

            $total_ht=0.0;
            $total_ppc=0.0;

            for ($i=0; $i< count($quote->medications); $i++){

                $medic=Medication::find($quote->medications[$i]->id);

                $invoice->Medications()->attach($quote->medications[$i]->id,
                    ['quantity' => $quote->medications[$i]->pivot->quantity,
                        'total_price'=>$quote->medications[$i]->pivot->total_price]);

                $total_ht+=$quote->medications[$i]->pivot->quantity*$medic->price;
                $total_ppc+=$quote->medications[$i]->pivot->quantity*$medic->ppc;

                $medic->quantity-=$quote->medications[$i]->pivot->quantity;
                $medic->name_plot=$medic->name.', '.$medic->plot.', qte: '.$medic->quantity;

                $medic->save();

            }

            $invoice->total_ht=$total_ht;
            $invoice->total_ppc=$total_ppc;
            $invoice->tva=$total_ht*0.19;

            $invoice->total_ttc=$total_ht + $invoice->tva;

            $invoice->total_to_pay = $invoice->total_ttc - (($invoice->total_ttc * $quote->discount) / 100);

            $invoice->invoice_id='F'.$invoice->id;

            $invoice->save();

            Session::flash('success','Fcture ete bien ajouté');

            return redirect(route('invoice.show',["id"=>$invoice->id]));

        }catch (\Exception $exception){

            Session::flash('error','Erreur d\'ajout');
            return redirect(route('/invoices'));
        }


    }
}
