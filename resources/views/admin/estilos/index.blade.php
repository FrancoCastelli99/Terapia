@extends('adminlte::page')

@section('title', 'Modelos')

@section('content_header')
    <h1>Lista de Modelos</h1>
@stop

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            <strong>
                {{ session('message') }}
            </strong>
        </div>
    @endif

    <div class="card-header">
        <a href="{{ route('admin.estilos.create') }}" class="btn btn-success"> Nuevo Modelo</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estilos as $estilo)
                        <tr>
                            <td>{{ $estilo->id }}</td>
                            <td>{{ $estilo->name }}</td>
                            <td width="15px" ><a href="{{ route('admin.estilos.edit', $estilo) }}" class="btn btn-primary btn-sm" >Editar</a></td>
                            <td width="15px" >
                                <form action="{{ route('admin.estilos.destroy', $estilo) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

