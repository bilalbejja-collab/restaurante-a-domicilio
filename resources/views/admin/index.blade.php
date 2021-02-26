@extends('adminlte::page')

@section('content')
    @hasanyrole ('Admin|GRestaurante|Repartidor')
        <p>BIENVENIDO AL PANEL DE ADMINISTRACIÓN</p>
    @endrole
@stop

@section('title', 'Restaurante a domicilio')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
