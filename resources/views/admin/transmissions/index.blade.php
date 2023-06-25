@extends('adminlte::page')

@section('title', 'Transmisiónes')

@section('content_header')
    <h1>Lista de Transmisiónes</h1>
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
        <a href="{{ route('admin.transmissions.create') }}" class="btn btn-success"> Nueva Transmisión</a>
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
                    @foreach ($transmissions as $transmission)
                        <tr>
                            <td>{{ $transmission->id }}</td>
                            <td>{{ $transmission->name }}</td>
                            <td width="15px" ><a href="{{ route('admin.transmissions.edit', $transmission) }}" class="btn btn-primary btn-sm" >Editar</a></td>
                            <td width="15px" >
                                <form action="{{ route('admin.transmissions.destroy', $transmission) }}" method="POST">
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

