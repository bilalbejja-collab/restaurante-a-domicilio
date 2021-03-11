<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre del restaurante">
        </div>

        @if ($restaurantes->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Latidud</th>
                        <th>Longitud</th>
                        <th colpsan="2"></th>
                    </thead>

                    <tbody>
                        @foreach ($restaurantes as $restaurante)
                            <tr>
                                <td>{{ $restaurante->nombre }}</td>
                                <td>{{ $restaurante->direccion }}</td>
                                <td>{{ $restaurante->ciudad }}</td>
                                <td>{{ $restaurante->latitud }}</td>
                                <td>{{ $restaurante->longitud }}</td>
                                <td width="10px">

                                    @can('admin.restaurantes.edit')
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.restaurantes.edit', $restaurante->id) }}">
                                            Editar
                                        </a>
                                    @endcan

                                </td>
                                <td width="10px">

                                    @can('admin.restaurantes.destroy')
                                        <form action="{{ route('admin.restaurantes.destroy', $restaurante) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $restaurantes->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
