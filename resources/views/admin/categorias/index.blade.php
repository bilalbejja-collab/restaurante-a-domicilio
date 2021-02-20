@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <h1>Lista de categorías</h1>
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
        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('admin.categorias.create') }}">
                Añadir categoría
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colpsan="2"></th>
                </thead>

                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.categorias.edit', $categoria->id) }}">
                                    Editar
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST">
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
