<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fuels = Fuel::all();
        return view('admin.fuels.index', compact('fuels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.fuels.create');
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

        $fuel = new Fuel();
        $fuel->name  = $request->name;
        $fuel->slug = \Str::slug($request->name);
       

        if ( $fuel->save() ) {
            return redirect()->route('admin.fuels.index')->with('message', 'El Combustible se ha creado con exito.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(Fuel $fuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuel $fuel)
    {
        //
        return view('admin.fuels.edit', compact('fuel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuel $fuel)
    {
        //
        $request->validate(
            ['name'=>'required']
        );
        
        $fuel->name = $request->name;
        $fuel->slug = \Str::slug($request->name);

        
        if ($fuel->save()) {
            return redirect()->route('admin.fuels.index')->with('message', 'El Combustible se ha actualizado con exito.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuel $fuel)
    {
        //
        $fuel->delete();
        return redirect()->route('admin.fuels.index')->with('message', 'El Combustible se ha eliminado con exito.');
    }
}
