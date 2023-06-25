<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Type;
use App\Models\Brand;
use App\Models\Image;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        return view('admin.cars.create', [
            'types' => $types,
            'brands' => $brands,
        ]);
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
            [
                'name'=>'required',
                'price'=>'required',
                'anio'=>'required',
                'mileage'=>'required',
                'color'=>'required',
                'description'=>'required',
            ]
        );

        $car = new Car();
        $car->name = $request->name;
        $car->slug = \Str::slug($request->name);
        $car->price = $request->price;
        $car->anio = $request->anio;
        $car->mileage = $request->mileage;
        $car->color = $request->color;
        $car->description = $request->description;
        $car->save();

        foreach ($request->file('images') as $imagefile) {
            $image = new Image();
            $path = $imagefile->store('/images/resource', ['disk' => 'my_files']);
            $image->url = $path;
            $image->car_id = $car->id;
            $image->save();
        }

        return redirect()->route('admin.cars.index')->with('message', 'El Auto se ha creado con exito.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
