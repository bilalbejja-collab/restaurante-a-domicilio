<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre de un plato">
        </div>

        @if ($platos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($platos as $plato)
                            <tr>
                                <td>{{ $plato->id }}</td>
                                <td>{{ $plato->nombre }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary btn.sm"
                                        href="{{ route('admin.platos.edit', $plato) }}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('admin.platos.destroy', $plato) }}" method="POST">
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
                {{ $platos->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
