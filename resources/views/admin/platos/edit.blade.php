@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <h1>Editar plato</h1>
@stop


@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($plato, ['route' => ['admin.platos.update', $plato], 'files' => true, 'method' => 'put']) !!}

            @include('admin.platos.partials.form', ['categorias' => $categorias])

            {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

    </style>
@endsection

{{-- Incluir el CKEdit --}}
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#descripcion'))
            .catch(error => {
                console.error(error);
            });

        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }

    </script>
@stop
