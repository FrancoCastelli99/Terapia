<?php

namespace App\Http\Controllers;

use App\Models\Estilo;
use Illuminate\Http\Request;

class EstiloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estilos = Estilo::all();
        return view('admin.estilos.index', compact('estilos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.estilos.create');
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

        $estilo = new Estilo();
        $estilo->name  = $request->name;
        $estilo->slug = \Str::slug($request->name);
       

        if ( $estilo->save() ) {
            return redirect()->route('admin.estilos.index')->with('message', 'El Modelo se ha creado con exito.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estilo  $estilo
     * @return \Illuminate\Http\Response
     */
    public function show(Estilo $estilo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estilo  $estilo
     * @return \Illuminate\Http\Response
     */
    public function edit(Estilo $estilo)
    {
        //
        return view('admin.estilos.edit', compact('estilo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estilo  $estilo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estilo $estilo)
    {
        //
        $request->validate(
            ['name'=>'required']
        );
        
        $estilo->name = $request->name;
        $estilo->slug = \Str::slug($request->name);

        
        if ($estilo->save()) {
            return redirect()->route('admin.estilos.index')->with('message', 'El Modelo se ha actualizado con exito.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estilo  $estilo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estilo $estilo)
    {
        //
        $estilo->delete();
        return redirect()->route('admin.estilos.index')->with('message', 'El Modelo se ha eliminado con exito.');
    }
}
