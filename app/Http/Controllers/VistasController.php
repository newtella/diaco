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
use Carbon\Carbon;
use Illuminate\Support\Str;

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

    public function vistaSinQuejas(){

        $vsinquejas = DB::table('vsin_quejas')
        ->select('Sucursal', 'Comercio','Municipio','Departamento','Region')
        ->orderBy('Region', 'desc')
        ->get();
        return Datatables::of($vsinquejas)->make(true);

    }

    public function toViewSQ(){

        return view('complains.vSinQuejas');

    }

    public function vistaQuejas(){

        $vquejas = DB::table('vquejas_region_anio')
        ->select('Documento', 'fecha','Razón','Solicitud','Sucursal','Telefono','Direccion','Comercio','Municipio','Departamento','Region')
        ->orderBy('Fecha', 'desc')
        ->get();
        return Datatables::of($vquejas)
        ->editColumn('fecha', function ($data) {
            return $data->fecha ? with(new Carbon($data->fecha))->format('d/m/Y') : '';
        })
        ->make(true);

    }

    public function toViewQA(){

        return view('complains.vQuejasRegionAnio');

        
    }

    





    //
}
