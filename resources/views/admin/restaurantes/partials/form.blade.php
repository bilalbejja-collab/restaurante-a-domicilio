<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el nombre',
    ]) !!}

    @error('nombre')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Dirección') !!}
    {!! Form::text('direccion', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese la dirección',
    ]) !!}

    @error('direccion')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('ciudad', 'Ciudad') !!}
    {!! Form::text('ciudad', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese la ciudad',
    ]) !!}

    @error('ciudad')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('telefono', 'Teléfono') !!}
    {!! Form::tel('telefono', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el número de teléfono',
    ]) !!}

    @error('telefono')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('latitud', 'Latitud') !!}
    {!! Form::number('latitud', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese la latitud',
    ]) !!}
</div>

<div class="form-group">
    {!! Form::label('longitud', 'Longitud') !!}
    {!! Form::number('longitud', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese la longitud',
    ]) !!}
</div>
