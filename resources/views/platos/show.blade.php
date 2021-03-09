@can('platos.index')
    <x-app-layout>
        <div class="container py-8">
            {{--Notificación de que el plato si añadó o no al carrito--}}

            @if (session('info'))
                <div x-data="{ show: true }" x-show="show"
                    class="text-center bg-{{ session('color') }}-100 mb-4 border border-{{ session('color') }}-400 text-{{ session('color') }}-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong>
                        {{ session('info') }}
                    </strong>
                    <div>
                        <button type="button" @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-{{ session('color') }}-500" role="button" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <h1 class="text-4xl font-bold text-gray-500">{{ $plato->nombre }}</h1>

            <div class="text-lg text-gray-500 mb-2">
                {{ $plato->nombre }}
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Conetenido principal --}}
                <div class="lg:col-span-2">
                    <figure>
                        @if ($plato->foto)
                            <img class="w-full h-80 object-cover object-center"
                                src="{{ url('storage/' . $plato->foto->url) }}" alt="{{ url('storage/' . $plato->foto->url) }}">
                        @else
                            <img class="w-full h-80 object-cover object-center"
                                src="https://cdn.pixabay.com/photo/2021/02/06/19/29/pancakes-5989136_1280.jpg" alt="">
                        @endif
                    </figure>

                    <!-- Carrito de compra: Button añdir al carro -->

                    <form action="{{ route('carro.add') }}" method="POST">
                        @csrf

                        <input type="hidden" name="plato_id" value="{{ $plato->id }}">

                        <div class="inline-block mr-2 mt-4 flex justify-center">
                            <button type="submit"
                                class="text-white text-lg py-2.5 px-5 rounded-md bg-gray-800 hover:bg-gray-900 hover:shadow-lg font-mono">
                                Añadir al pedido {{ $plato->precio }}€
                            </button>
                        </div>
                    </form>

                    <div class="text-base text-gray-500 mt-4">
                        {!! $plato->descripcion !!}
                    </div>

                </div>

                {{-- Conetenido relacionado --}}
                <aside>
                    <h1 class="text-2xl text-bold text-gray-600 mb-4">Más en {{ $plato->categoria->nombre }}</h1>
                    <ul>
                        @foreach ($similares as $similar)
                            <li class="mb-4">
                                <a class="flex" href="{{ route('platos.show', $similar) }}">

                                    @if ($similar->foto)
                                        <img class="w-36 h-20 object-cover object-center"
                                            src="{{ url('storage/' . $similar->foto->url) }}" alt="{{ url('storage/' . $similar->foto->url) }}">
                                    @else
                                        <img class="w-36 h-20 object-cover object-center"
                                            src="https://cdn.pixabay.com/photo/2021/02/06/19/29/pancakes-5989136_1280.jpg"
                                            alt="">
                                    @endif

                                    <span class="ml-2 text-gray-600">
                                        {{ $similar->nombre }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
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
