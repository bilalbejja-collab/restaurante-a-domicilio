@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')

    @can('admin.restaurantes.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.restaurantes.create') }}">
            Nueva restaurante
        </a>
    @endcan

    <h1>Listado de restaurantes</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif

    @livewire('admin.restaurantes-index')
@endsection
