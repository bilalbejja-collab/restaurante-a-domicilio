<!--
<div class="form-group">
    <label for="">Estado:</label>

    <select name="estado" id="" class="form-control">
        <option value="libre">Libre</option>
        <option value="ocupado">Ocupado</option>
    </select>
</div>

//Lo usare en pedidos
{!! Form::hidden('user_id', auth()->user()->id()) !!}
-->
<div class="form-group">
    {!! Form::label('estado', 'Estado') !!}
    {!! Form::select('estado', $estados, $selected, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
                    <p class="font-weight-bold">Restaurantes</p>

                    @foreach ($restaurantes as $restaurante)
                        <label class="mr-2">
                            {!! Form::checkbox('restaurantes[]', $restaurante->id, null) !!}
                            {{$restaurante->nombre}}
                        </label>
                    @endforeach
                </div>
