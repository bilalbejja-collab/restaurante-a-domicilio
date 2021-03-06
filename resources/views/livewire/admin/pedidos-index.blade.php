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
                            <th>Estado</th>
                            <th>Platos</th>
                            <th>Restaurante</th>
                            <th>Repartidor</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pedidos as $pedido)
                            @if ($pedido->repartidor_id == Auth::id() || Auth::user()->roles->first()->name == 'Admin')
                                <tr>
                                    <td>{{ $pedido->estado }}</td>
                                    {{-- <td>{{ $pedido->platos[0]['pivot']['cantidad'] }}</td> --}}

                                    <td>

                                        <a
                                            href="{{ route('admin.pedido.platos', $pedido) }}">
                                            <i class="far fa-eye"></i>
                                        </a>

                                    </td>

                                    <td>{{ App\Models\Restaurante::where('id', $pedido->restaurante_id)->first()->nombre }}
                                    </td>
                                    <td>
                                        @if ($pedido->repartidor_id == '')
                                            No asignado
                                        @else
                                            {{ App\Models\User::where('id', $pedido->repartidor_id)->first()->name }}
                                        @endif
                                    </td>
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
                            @endif
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
