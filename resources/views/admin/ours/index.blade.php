@extends('adminlte::page')

@section('title', 'Nosotros')

@section('content_header')
    <h1>Secciones Nosotros</h1>
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
        <a href="{{ route('admin.ours.create') }}" class="btn btn-success"> Nueva Sección</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TEXTO</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ours as $our)
                        <tr>
                            <td>{{ $our->id }}</td>
                            <td>{{ $our->description }}</td>
                            <td width="15px" ><a href="{{ route('admin.ours.edit', $our) }}" class="btn btn-primary btn-sm" >Editar</a></td>
                            <td width="15px" >
                                <form action="{{ route('admin.ours.destroy', $our) }}" method="POST">
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

