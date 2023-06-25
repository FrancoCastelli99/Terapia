@extends('adminlte::page')

@section('title', 'Combustibles')

@section('content_header')
    <h1>Editar Combustible</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($fuel,['route'=>['admin.fuels.update', $fuel], 
                                    'method'=>'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese Combustible']) !!}
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {!! Form::submit('Actualizar Combustible', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop