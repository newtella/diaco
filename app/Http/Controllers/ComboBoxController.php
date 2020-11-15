<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Department;
use App\Municipality;
use App\Branch;

class ComboBoxController extends Controller
{
    public function region(Request $request){

        $regiones = Region::all();
        return $regiones;
    }

    public function department($id){

        $departments = Department::where('region_id', $id)->get();
        return $departments;

    }

    public function municipality($id){

        $municipalities = Municipality::where('department_id', $id)->get();
        return $municipalities;

    }

    public function branch($id){

        $branches = Branch::where('municipality_id', $id)->get();
        return $branches;

    }
}
