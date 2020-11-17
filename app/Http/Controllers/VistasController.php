<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Department;
use App\Municipality;
use App\Branch;
use App\Shop;
use App\Complain;
use DB;
use DataTables;


class VistasController extends Controller
{
    public function index()
    {
        return view('complains.dataTable');
      
    }
    public function vistaConteoQuejas(){

        $vista = DB::table('vconteo_quejas_sucursal')
        ->select('Regiones', 'Departamento', 'Municipio', 'Comercio','Sucursal', 'Quejas')
        ->orderBy('Regiones', 'desc')
        ->orderBy('Departamento', 'desc')
        ->get();
        return Datatables::of($vista)->make(true);
    }
    //
}
