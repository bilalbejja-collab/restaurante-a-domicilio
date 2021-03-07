@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')

    {{-- @can('admin.pedidos.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.pedidos.create') }}">
            Nuevo pedido
        </a>
    @endcan --}}
    <h1>Lista de pedidos</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif

    @livewire('admin.pedidos-index')
@endsection
