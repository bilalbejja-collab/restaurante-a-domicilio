<div class="form-group">
    {!! Form::label('dni', 'DNI') !!}
    {!! Form::text('dni', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el DNI del repartidor',
    ]) !!}

    @error('dni')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el nombre del repartidor',
    ]) !!}

    @error('name')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('lastname', 'Apellidos') !!}
    {!! Form::text('lastname', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese los apellidos del repartidor',
    ]) !!}

    @error('lastname')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el email del repartidor',
    ]) !!}

    @error('email')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('address', 'Dirección') !!}
    {!! Form::text('address', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese la dirección del repartidor',
    ]) !!}

    @error('address')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('city', 'Ciudad') !!}
    {!! Form::text('city', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese la ciudad del repartidor',
    ]) !!}

    @error('city')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('movil', 'Teléfono') !!}
    {!! Form::tel('movil', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese el número de teléfono del repartidor',
    ]) !!}

    @error('movil')
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

<div class="form-group">
    {!! Form::label('password', 'Contraseña') !!}
    {!! Form::text('password', null, [
    'class' => 'form-control',
    'placeholder' => 'Ingrese la contraseña del repartidor',
    ]) !!}

    @error('password')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
