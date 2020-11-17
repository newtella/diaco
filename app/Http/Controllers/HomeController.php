<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complain;

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
        $conteoNuevos = Complain::where('status_id',1)->groupBy('status_id')->count('Status_id');
        $conteoRevision = Complain::where('status_id',2)->groupBy('status_id')->count('Status_id');
        $conteoCerrados = Complain::where('status_id',3)->groupBy('status_id')->count('Status_id');  
        return view('home', compact('conteoNuevos','conteoRevision','conteoCerrados'));
      
    }

    public function countComplainToChart(Complain $conteoNuevos)
    {
        
    }
}
