<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el nombre del repartidor',
    ]) !!}

    @error('nombre')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::text('apellidos', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese los apellidos del repartidor',
    ]) !!}

    @error('apellidos')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('telefono', 'Teléfono') !!}
    {!! Form::tel('telefono', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el número de teléfono del repartidor',
    ]) !!}

    @error('telefono')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('salario', 'Salario') !!}
    {!! Form::number('salario', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el salario del repartidor',
    ]) !!}

    @error('salario')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    <label class="mr-2">
        {!! Form::radio('estado', 'libre', true) !!}
        Libre
    </label>

    <label>
        {!! Form::radio('estado', 'ocupado') !!}
        Ocupado
    </label>
</div>
