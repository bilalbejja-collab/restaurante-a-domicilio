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

            {{-- Añadir la cantidad correspondiente --}}
            @php
                $pedido->cantidad = $pedido->platos[0]->pivot['cantidad'];

                if (Auth::user()->roles->first()->name == 'Repartidor') {
                    $estados = ['entregado' => 'entregado'];
                }
            @endphp

            {!! Form::model($pedido, ['route' => ['admin.pedidos.update', $pedido], 'method' => 'put']) !!}

            {{-- Guardar el id del cliente que hizo el pedido en un hidden --}}
            {!! Form::hidden('user_id', $pedido->user_id) !!}

            <div class="form-group">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::select('estado', $estados, null, ['class' => 'form-control']) !!}

                @error('estado')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('restaurante_id', 'Restaurante') !!}

                @if (Auth::user()->roles->first()->name == 'Repartidor')
                    {!! Form::select('restaurante_id', $restaurantes, null, ['class' => 'form-control', 'disabled', 'readonly']) !!}
                @else
                    {!! Form::select('restaurante_id', $restaurantes, null, ['class' => 'form-control']) !!}
                @endif

                @error('restaurante_id')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('repartidor_id', 'Repartidor') !!}

                @if (Auth::user()->roles->first()->name == 'Repartidor')
                    {!! Form::select('repartidor_id', $repartidores, null, ['class' => 'form-control', 'disabled', 'readonly']) !!}
                @else
                    {!! Form::select('repartidor_id', $repartidores, null, ['class' => 'form-control']) !!}
                @endif

                @error('repartidor_id')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            {!! Form::submit('Actualizar pedido', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
