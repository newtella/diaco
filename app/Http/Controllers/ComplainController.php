<?php

namespace App\Http\Controllers;

use App\Complain;
use Illuminate\Http\Request;
use App\Shop;
use Carbon\Carbon;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('complains.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();
        return view('complains.create',compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required',
            'request' => 'required',
            'branch_id' => 'required',
        ]);

        $document = Complain::all()->last();
        $date = Carbon::today()->toDateString();
        if($document == null){
            $document = 1;
            $merged = $request->merge(['document' =>  $document, 'date' => $date, 'status_id' => 1]);
        } else {
            $merged = $request->merge(['document' =>  $document->document + 1, 'date' => $date, 'status_id' => 1]);
        }

        $complain = Complain::create($merged->all());

        return redirect()->route('complains.index')
        ->with('success','Queja Creada Correctamente. El no. de Queja es el: ' .$complain->id.
        ' Guardelo en un lugar seguro, si despues desea ver el estado de su queja puede colocarlo en la caja de busqueda');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function edit(Complain $complain)
    {
        return view('complains.edit',compact('complain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complain $complain)
    {
        $request->validate([
            'document' => 'required',
            'date' => 'required',
            'reason' => 'required',
            'request' => 'required',
            'branch_id' => 'required',
            'status_id' => 'required',
        ]);
  
        $complain->update($request->all());
  
        return redirect()->route('complains.index')
                        ->with('success','Queja Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complain $complain)
    {
        $complain->delete();
  
        return redirect()->route('complains.index')
                        ->with('success','Queja Eliminada Correctamente');
    }

    public function search(Request $request)
    {
        $complain = Complain::With('resolution')->where('document', $request->document)->first();
        if($complain == null){
            return redirect()->route('complains.index')
            ->with('error','No se encontro Ninguna Queja con ese numero.');
        }
        return view('complains.show',compact('complain'));
    }
}
