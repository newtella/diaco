<?php

namespace App\Http\Controllers;

use App\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complains = Complain::latest()->paginate(5);
  
        return view('complains.index',compact('complains'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complains.create');
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
            'document' => 'required',
            'date' => 'required',
            'reason' => 'required',
            'request' => 'required',
            'branch_id' => 'required',
            'status_id' => 'required',
        ]);

        Complain::create($request->all());
   
        return redirect()->route('complains.index')
                        ->with('success','Queja Creada Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function show(Complain $complain)
    {
        return view('complains.show',compact('complain'));
    }

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
}
