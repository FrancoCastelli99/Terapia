@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1>Editar Marca</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($brand,['route'=>['admin.brands.update', $brand], 
                                    'method'=>'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese Marca']) !!}
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {!! Form::submit('Actualizar Marca', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop