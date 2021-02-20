@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <h1>Editar Plato</h1>
@stop


@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($plato, ['route' => ['admin.platos.update', $plato], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, [
                'class' => 'form-control',
                'placeholder' => 'Ingrese el nombre de la categoría',
                ]) !!}

                @error('nombre')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
