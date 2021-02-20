@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <h1>Modificar detalle de la restaurante</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($restaurante, ['route' => ['admin.restaurantes.update', $restaurante], 'method' => 'put']) !!}

            @include('admin.restaurantes.partials.form')

            {!! Form::submit('Actualizar restaurante', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
