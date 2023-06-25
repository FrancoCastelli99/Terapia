@extends('adminlte::page')

@section('title', 'Tipos')

@section('content_header')
    <h1>Editar Tipo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($type,['route'=>['admin.types.update', $type],
                                    'method'=>'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese Tipo']) !!}
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {!! Form::submit('Actualizar Tipo', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
