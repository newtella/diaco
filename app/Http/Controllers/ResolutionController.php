<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complain;
use App\Resolution;
use App\Status;
use Carbon\Carbon;
use DB;

class ResolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resolutions = Resolution::with('complain')->latest()->paginate(5);

        return view('resolutions.index', compact('resolutions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $complain = Complain::with("branch")->where('id', $request)->first();
        $statuses = Status::all();
        return view('resolutions.create', compact('complain', 'statuses'));
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
            'detail' => 'required',
            'complain_id' => 'required',
        ]);
        $date = Carbon::today()->toDateString();
        $merged = $request->merge(['date' => $date, 'complain_id' => $request->complain_id]);
        Resolution::create($merged->all());

        $complain = Complain::where('id', $request->complain_id)->first();
        $complain->status_id = "3";
        $complain->save();

        return redirect()->route('resolutions.index')
            ->with('success', 'Resolucion Creada Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        $resolution = Resolution::where('complain_id', $request)->first();
        return view('resolutions.show',compact('resolution'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Resolution $resolution)
    {
        /* return view('complains.show', compact('complain'));
        $resolution = Resolution::where('complain_id', $request)->first(); */
        return view('resolutions.edit', compact('resolution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resolution $resolution)
    {
        $request->validate([
            'detail' => 'required',
        ]);

        $resolution->update($request->all());
  
        return redirect()->route('resolutions.index')
                        ->with('success','Resolución Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resolution $resolution)
    {
        $resolution->delete();
  
        return redirect()->route('resolutions.index')
                        ->with('success','Resolución Eliminada Correctamente');
    }
}
