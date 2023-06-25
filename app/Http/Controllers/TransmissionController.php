<?php

namespace App\Http\Controllers;

use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transmissions = Transmission::all();
        return view('admin.transmissions.index', compact('transmissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.transmissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            ['name'=>'required']
        );

        $transmission = new Transmission();
        $transmission->name  = $request->name;
        $transmission->slug = \Str::slug($request->name);
       

        if ( $transmission->save() ) {
            return redirect()->route('admin.transmissions.index')->with('message', 'La Transmisión se ha creado con exito.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transmission  $transmission
     * @return \Illuminate\Http\Response
     */
    public function show(Transmission $transmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transmission  $transmission
     * @return \Illuminate\Http\Response
     */
    public function edit(Transmission $transmission)
    {
        //
        return view('admin.transmissions.edit', compact('transmission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transmission  $transmission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transmission $transmission)
    {
        //
        $request->validate(
            ['name'=>'required']
        );
        
        $transmission->name = $request->name;
        $transmission->slug = \Str::slug($request->name);

        
        if ($transmission->save()) {
            return redirect()->route('admin.transmissions.index')->with('message', 'La Transmisión se ha actualizado con exito.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transmission  $transmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transmission $transmission)
    {
        //
        $transmission->delete();
        return redirect()->route('admin.transmissions.index')->with('message', 'La Transmisión se ha eliminado con exito.');
    }
}
