@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.pedidos.index') }}">
        Volver al pedido
    </a>
    <h1>Platos del pedido</h1>
@stop

@section('content')
    @livewire('admin.pedido-platos', ['pedido' => $pedido])
@endsection
