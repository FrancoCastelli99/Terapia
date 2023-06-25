<?php

namespace App\Http\Controllers;

use App\Models\Our;
use Illuminate\Http\Request;

class OurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ours = Our::all();
        return view('admin.ours.index', compact('ours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ours.create');
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
            ['description'=>'required']
        );

        $our = new Our();
        $our->description  = $request->description; 

        if ( $our->save() ) {
            return redirect()->route('admin.ours.index')->with('message', 'La Sección se ha creado con exito.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Our  $our
     * @return \Illuminate\Http\Response
     */
    public function show(Our $our)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Our  $our
     * @return \Illuminate\Http\Response
     */
    public function edit(Our $our)
    {
        //
        return view('admin.ours.edit', compact('our'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Our  $our
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Our $our)
    {
        //
        $request->validate(
            ['description'=>'required']
        );
        
        $our->description = $request->description;

        if ($our->save()) {
            return redirect()->route('admin.ours.index')->with('message', 'La Sección se ha actualizado con exito.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Our  $our
     * @return \Illuminate\Http\Response
     */
    public function destroy(Our $our)
    {
        //
        $our->delete();
        return redirect()->route('admin.ours.index')->with('message', 'La sección se ha eliminado con exito.');
    }
}
