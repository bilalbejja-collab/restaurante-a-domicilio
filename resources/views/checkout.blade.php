@can('platos.index')
    <x-app-layout>
        <div class="container py-8">
            @if (count(Cart::getContent()))
                <h2 class="h2 text-center text-gray-600 mb-5 font-mono text-xl font-bold">TU CARRITO DE COMPRA</h2>
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
                                                    Foto</th>
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
                                                    <img src="{{ $plato->image['urlfoto'] }}"
                                                        style="width: 100px; height: 80px;"
                                                        alt="{{ $plato->image['urlfoto'] }}">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <form action="{{ route('carro.borrar') }}" method="post">
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
                <form action="{{ route('carro.comprar') }}" method="POST">
                    @csrf

                    <input type="hidden" name="plato_id" value="{{ $plato->id }}">
                    <input type="hidden" name="cliente_id" value="{{ Auth::id() }}">

                    <div class="inline-block mr-2 mt-4 flex justify-center">
                        <button type="submit"
                            class="text-white text-lg py-2.5 px-5 rounded-md bg-gray-800 hover:bg-gray-900 hover:shadow-lg font-mono">
                            HACER LA COMPRA
                        </button>
                    </div>
                </form>
            @else
                <h2 class="h2 text-center text-gray-600 mb-5 font-mono text-xl font-bold">CARRITO VACÍO</h2>
            @endif
        </div>
    </x-app-layout>
@else
    <x-app-layout>
        <div class="container py-8">
            <div class="text-center">
                ESTA ACCIÓN SOLO ESTÁ PERMITIDA A LOS CLIENTES
            </div>
        </div>
    </x-app-layout>
@endcan
