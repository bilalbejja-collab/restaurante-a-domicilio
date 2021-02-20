<!--
<div class="form-group">
    <label for="">Estado:</label>

    <select name="estado" id="" class="form-control">
        <option value="libre">Libre</option>
        <option value="ocupado">Ocupado</option>
    </select>
</div>
-->
<div class="form-group">
    {!! Form::label('estado', 'Estado') !!}
    {!! Form::select('estado', $estados, $selected, ['class' => 'form-control']) !!}
</div>
