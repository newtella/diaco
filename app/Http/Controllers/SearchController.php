<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complain;
use App\Shop;
use Carbon\Carbon;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('searches.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();
        return view('searches.create', compact('shops'));
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
        if ($document == null) {
            $document = 1;
            $merged = $request->merge(['document' =>  $document, 'date' => $date, 'status_id' => 1]);
        } else {
            $merged = $request->merge(['document' =>  $document->document + 1, 'date' => $date, 'status_id' => 1]);
        }

        $complain = Complain::create($merged->all());

        return redirect()->route('searches.index')
            ->with('success', 'Queja Creada Correctamente. El no. de Queja es el: ' . $complain->document .
                ' Guardelo en un lugar seguro, si despues desea ver el estado de su queja puede colocarlo en la caja de busqueda');
    }
    public function search(Request $request)
    {
        $complain = Complain::With('resolution')->where('document', $request->document)->first();
        
        
        if ($complain == null) {
            return redirect()->route('searches.index')
                ->with('error', 'No se encontro Ninguna Queja con ese numero.');
        }
        
        $fecha= $complain->date ? with(new Carbon($complain->date))->format('d/m/Y') : '';
        $fecharesolucion = $complain->resolution->date ? with(new Carbon($complain->resolution->date))->format('d/m/Y') : '';
        return view('searches.show', compact('complain','fecha','fecharesolucion'));
    }
}
