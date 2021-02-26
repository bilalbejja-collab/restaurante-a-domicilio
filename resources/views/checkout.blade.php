<x-app-layout>
    <div class="container py-8">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @if (count(Cart::getContent()))
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </thead>
                    <tbody>
                        @foreach (Cart::getContent() as $plato)
                            <tr>
                                <td>{{ $plato->id }}</td>
                                <td>{{ $plato->name }}</td>
                                <td>{{ $plato->price }}</td>
                                <td>{{ $plato->quantity }}</td>
                                <td>
                                    <form action="{{ route('cart.removeitem') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $plato->id }}">
                                        <button type="submit" class="btn btn-link btn-sm text-danger">X</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Carrito vacío</p>
            @endif
        </div>
    </div>
</x-app-layout>
