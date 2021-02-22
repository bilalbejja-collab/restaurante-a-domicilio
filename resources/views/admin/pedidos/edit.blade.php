@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <h1>Editar pedido</h1>
@stop


@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($pedido, ['route' => ['admin.pedidos.update', $pedido], 'method' => 'put']) !!}

            @include('admin.pedidos.partials.form')

            {!! Form::submit('Actualizar pedido', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
