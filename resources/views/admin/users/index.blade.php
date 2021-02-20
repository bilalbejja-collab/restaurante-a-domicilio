@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Bilal's Coding</h1>
@stop

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
