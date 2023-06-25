@extends('adminlte::page')

@section('title', 'Modelos')

@section('content_header')
    <h1>Editar Modelo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($estilo,['route'=>['admin.estilos.update', $estilo], 
                                    'method'=>'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese Modelo']) !!}
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {!! Form::submit('Actualizar Modelo', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop