@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.restaurantes.create') }}">
        Nueva restaurante
    </a>

    <h1>Mostrar listado de restaurantes</h1>
@stop


@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Latidud</th>
                    <th>Longitud</th>
                    <th colpsan="2"></th>
                </thead>

                <tbody>
                    @foreach ($restaurantes as $restaurante)
                        <tr>
                            <td>{{ $restaurante->id }}</td>
                            <td>{{ $restaurante->nombre }}</td>
                            <td>{{ $restaurante->direccion }}</td>
                            <td>{{ $restaurante->ciudad }}</td>
                            <td>{{ $restaurante->latitud }}</td>
                            <td>{{ $restaurante->longitud }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.restaurantes.edit', $restaurante->id) }}">
                                    Editar
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.restaurantes.destroy', $restaurante) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
