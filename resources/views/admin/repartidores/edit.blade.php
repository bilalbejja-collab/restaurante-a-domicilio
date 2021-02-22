@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <h1>Editar repartidor</h1>
@stop


@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($repartidore, ['route' => ['admin.repartidores.update', $repartidore], 'method' => 'put']) !!}

            @include('admin.repartidores.partials.form')

            {!! Form::submit('Actualizar repartidor', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
