<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el estado del pedido">
        </div>

        @if ($pedidos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estado</th>
                            <th>RestauranteID</th>
                            <th>RepartidorID</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->estado }}</td>
                                <td>{{ $pedido->restaurante_id }}</td>
                                <td>{{ $pedido->repartidor_id }}</td>
                                <td width="10px">

                                    @can('admin.pedidos.edit')
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.pedidos.edit', $pedido) }}">Editar</a>
                                    @endcan

                                </td>
                                <td width="10px">

                                    @can('admin.pedidos.destroy')
                                        <form action="{{ route('admin.pedidos.destroy', $pedido) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $pedidos->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
