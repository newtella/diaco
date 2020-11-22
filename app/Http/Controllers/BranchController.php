<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Shop;
use App\Region;
use App\Department;
use App\Municipality;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::with('municipality', 'shop')->latest()->paginate(5);
  
        return view('branches.index',compact('branches'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();
        return view('branches.create',compact('shops'));
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
            'name' => 'required',
            'phone' => 'required|numeric|digits:8',
            'address' => 'required',
            'municipality_id' => 'required',
            'shop_id' => 'required',
        ]);

        Branch::create($request->all());
   
        return redirect()->route('branches.index')
                        ->with('success','Sucursal Creada Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        
        return view('branches.show',compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        
        $municipalities = Municipality::where('id', '!=', $branch->municipality->id)
        ->where('department_id',  $branch->municipality->department->id )->get();
        
        $departments = Department::where('id', '!=', $branch->municipality->department->id)
        ->where('region_id',  $branch->municipality->department->region->id )->get();

        $regions = Region::where('id','!=', $branch->municipality->department->region->id)->get();

        $shops = Branch::where('shop_id', '!=', $branch->shop_id)->get();

        return view('branches.edit',compact('branch', 'municipalities','departments','regions', 'shops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits:8',
            'address' => 'required',
            'municipality_id' => 'required',
            'shop_id' => 'required',
        ]);
  
        $branch->update($request->all());
  
        return redirect()->route('branches.index')
                        ->with('success','Sucursal Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
  
        return redirect()->route('branches.index')
                        ->with('success','Sucursal Eliminada Correctamente');
    }
}
