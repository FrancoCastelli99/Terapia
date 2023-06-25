@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1>Lista de Marcas</h1>
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
        <a href="{{ route('admin.brands.create') }}" class="btn btn-success"> Nueva Marca</a>
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
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td width="15px" ><a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-primary btn-sm" >Editar</a></td>
                            <td width="15px" >
                                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST">
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

