@extends('adminlte::page')

@section('title', 'Autos')

@section('content_header')
    <h1>Nuevo Auto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.cars.store', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        {{-- Name --}}
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese Auto']) !!}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group col-md-6">
                        {{-- Price --}}
                        {!! Form::label('price', 'Precio') !!}
                        {!! Form::number('price', null, ['class'=>'form-control', 'placeholder'=>'0']) !!}
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div  class="form-group col-md-6">
                        {{-- Year --}}
                        {!! Form::label('anio', 'Año') !!}
                        {!! Form::number('anio', null, ['class'=>'form-control', 'placeholder'=>'2015', 'max'=>'2030', 'step'=>'1']) !!}
                        @error('anio')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div  class="form-group col-md-6">
                        {{-- Images --}}
                        {!! Form::label('images', 'Imagenes') !!}
                        {!! Form::file('images', ['class'=>'form-control', 'multiple' => true]) !!}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        {{-- Mileage --}}
                        {!! Form::label('mileage', 'Kilometraje') !!}
                        {!! Form::number('mileage', null, ['class'=>'form-control', 'placeholder'=>'10000', 'max'=>'9999999', 'step'=>'1']) !!}
                        @error('mileage')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        {{-- Color --}}
                        {!! Form::label('color', 'Color') !!}
                        {!! Form::text('color', null, ['class'=>'form-control', 'placeholder'=>'Blanco']) !!}
                        @error('color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        {{-- Description --}}
                        {!! Form::label('description', 'Descripción') !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        {{-- Tipo --}}
                        {!! Form::label('type_id', 'Tipo') !!}
                        {!! Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
                        @error('type_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        {{-- Marcas --}}
                        {!! Form::label('brand_id', 'Marca') !!}
                        {!! Form::select('brand_id', $brands, null, ['class' => 'form-control']) !!}
                        @error('brand_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {!! Form::submit('Guardar Auto', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop





