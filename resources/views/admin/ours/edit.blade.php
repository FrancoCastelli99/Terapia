@extends('adminlte::page')

@section('title', 'Nosotros')

@section('content_header')
    <h1>Editar Sección</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($our,['route'=>['admin.ours.update', $our], 
                                    'method'=>'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Ingrese Descripción']) !!}
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {!! Form::submit('Actualizar Sección', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop