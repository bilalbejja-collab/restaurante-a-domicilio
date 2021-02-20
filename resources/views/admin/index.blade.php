@extends('adminlte::page')

@section('content')
    @hasanyrole ('Admin|Blogger')
        <a href="#">YES admin or blogger</a>
    @endrole
@stop

@section('title', 'Bilal')

@section('content_header')
    <h1>Bilal's Code</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Hola mundo</h1>
        </div>

        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ex porro consequatur blanditiis aperiam nisi dolor voluptatum laborum ab neque, sint consectetur incidunt eveniet, dolore pariatur sed adipisci illum ipsa!</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
