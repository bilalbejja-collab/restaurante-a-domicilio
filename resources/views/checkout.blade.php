<x-app-layout>
    <div class="container py-8">

        @if (count(Cart::getContent()))
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nombre</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Precio</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cantidad</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Accion</th>
                                        </tr>
                                    </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach (Cart::getContent() as $plato)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $plato->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $plato->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $plato->price }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $plato->quantity }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form action="{{ route('cart.removeitem') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $plato->id }}">
                                                    <button type="submit" class="btn btn-link btn-sm text-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>Carrito vacío</p>
        @endif
    </div>
</x-app-layout>
