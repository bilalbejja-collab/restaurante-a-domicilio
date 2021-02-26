@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content')

    @livewire('admin.users-index')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
@stop
