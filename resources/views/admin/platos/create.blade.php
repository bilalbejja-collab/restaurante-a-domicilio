@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <h1>Crear Nuevo Plato</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.platos.store']) !!}

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

                {!! Form::submit('Crear categoría', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
