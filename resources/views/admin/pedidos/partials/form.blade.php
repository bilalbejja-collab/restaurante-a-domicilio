{!! Form::hidden('user_id', auth()->user()->id) !!}

<div class="form-group">
    {!! Form::label('estado', 'Estado') !!}
    {!! Form::select('estado', $estados , null, ['class' => 'form-control']) !!}

    @error('estado')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control', 'min' => 1]) !!}

    @error('cantidad')
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

<div class="form-group">
    {!! Form::label('repartidor_id', 'Repartidor') !!}
    {!! Form::select('repartidor_id', $repartidores, null, ['class'
    => 'form-control']) !!}

    @error('repartidor_id')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
