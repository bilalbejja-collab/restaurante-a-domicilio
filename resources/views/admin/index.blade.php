@extends('adminlte::page')

@section('content')
    @hasanyrole ('Admin|GRestaurante|Repartidor')
    <div class="container py-8 text-center text-gray-600 mb-5 font-mono text-xl">
        BIENVENIDO AL PANEL DE ADMINISTRACIÓN
    </div>
    @endrole
@stop

@section('title', 'Restaurante a domicilio')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
