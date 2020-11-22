<?php

namespace App\Http\Controllers;

use App\Client;
use App\Medication;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MedicationController extends Controller
{

    private $host='http://127.0.0.1:8000/storage/';
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
        $medications=Medication::all();

        return view('Admin.medication.index')->with("medications",$medications);
    }

    public function get(){

        return Medication::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.medication.create');
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
            "image" => "required|file|image|mimes:jpg,png,jpeg|max:5000",
            "description" => "required|string",
            "name" => "required|string",
            "quantity" => "required|int",
            "price" => "required",
            "plot" => "required|string",
            "ddp" => "required|string",
        ]);

        if ($data->fails()) {

            Session::flash('error','Vérifier les données SVP!');
            return redirect()->back();

        }

        try {

            $file=$request->file('image');
            $url=$file->store('MedicationsImages');

            Medication::create([
                'image' => $this->host.$url,
                'description' => $request->description,
                'ddp' => $request->ddp,
                'name' => $request->name,
                'plot' => $request->plot,
                'name_plot' => $request->name.', Lot: '.$request->plot.', qte: '.$request->quantity,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'user_id' => Auth::id(),
                'modified_by' => Auth::id(),
                'ppc'=>round($request->price*1.19*1.1*1.2, 4)
            ]);

            return redirect('medications');

        }catch (\Exception $exception)
        {
            return response()->json(["message"=>$exception->getMessage()],$exception->getCode());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function show(Medication $medication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function edit(Medication $medication, $id)
    {
        $medication=Medication::find($id)->load('user');

        return view('Admin.medication.detail')->with("medication",$medication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medication $medication, $id)
    {

        $data = Validator::make($request->all(), [
            "description" => "required|string",
            "name" => "required|string",
            "price" => "required",
            "plot" => "required|string",
            "ddp" => "required|string",
        ]);

        if ($data->fails()) {

            Session::flash('error','Vérifier les données SVP!');
            return redirect()->back();

        }

        $medication=Medication::find($id);

        $medication->name=$request->name;
        $medication->description=$request->name;
        $medication->price=$request->price;
        $medication->ppc=$request->price*1.19*1.1*1.2;
        $medication->quantity+=$request->quantity;
        $medication->modified_by=Auth::id();
        $medication->plot=$request->plot;
        $medication->ddp=$request->ddp;
        $medication->name_plot=$medication->name.', '.$medication->plot.', qte: '.$medication->quantity;

        $medication->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medication $medication)
    {
        //
    }

    public function delete($id){

        $medication=Medication::find($id);

        $medication->delete();

        Session::flash('success','Médicament supprimé avec succes');

        return redirect('medications');

    }
}
