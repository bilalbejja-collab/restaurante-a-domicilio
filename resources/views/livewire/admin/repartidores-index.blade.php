<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el estado de un repartidor">
        </div>

        @if ($repartidores->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Salario</th>
                            <th>Estado</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($repartidores as $repartidor)
                            <tr>
                                <td>{{ $repartidor->id }}</td>
                                <td>{{ $repartidor->name }}</td>
                                <td>{{ $repartidor->lastname }}</td>
                                <td>{{ $repartidor->movil }}</td>
                                <td>{{ $repartidor->salario }}</td>
                                <td>{{ $repartidor->estado }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.repartidores.edit', $repartidor) }}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('admin.repartidores.destroy', $repartidor) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $repartidores->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
