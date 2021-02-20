<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el nombre del plato',
    ]) !!}

    @error('nombre')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción') !!}
    {!! Form::textarea('descripcion', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese la descripción del plato',
    ]) !!}

    @error('descripcion')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($plato->foto)
                <img id="picture" src="{{ url('storage/' . $plato->foto->url) }}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2021/02/06/19/29/pancakes-5989136_1280.jpg" alt="">
            @endisset
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen del plato') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
        </div>

        @error('file')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('precio', 'Precio') !!}
    {!! Form::number('precio', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el precio del plato',
    ]) !!}

    @error('precio')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('categoria_id', 'Categoría') !!}
    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}

    @error('categoria_id')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('restaurante_id', 'Restaurante') !!}
    {!! Form::select('restaurante_id', $restaurantes, null, ['class' => 'form-control']) !!}

    @error('restaurante_id')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
