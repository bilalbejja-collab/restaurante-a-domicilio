<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text"
                placeholder="Ingrese el nombre o correo de un usuario">
        </div>

        {{--Comprobar que hay registros--}}
        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->dni }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td width='10px'>

                                    @can('admin.users.index')
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
