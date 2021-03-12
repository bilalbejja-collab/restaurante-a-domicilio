<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Foto</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($platos as $plato)
                        <tr>
                            <td>{{ $plato->nombre }}</td>
                            <td>{{ App\Models\Plato::where('categoria_id', $plato->categoria_id)->first()->nombre }}
                            </td>
                            <td>{{ $plato->precio }}€</td>
                            <td>{{ $plato->pivot['cantidad'] }}</td>
                            <td>
                                <img src="{{ $plato->attributes['urlfoto'] }}" style="width: 100px; height: 80px;">
                                {{-- en local
                                     <img src="{{ $plato->foto['urlfoto'] }}" style="width: 100px; height: 80px;"> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
