@can('platos.index')
    <x-app-layout>
        <div class="container py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($platos as $plato)
                    <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif" style="background-image:
                        url(@if ($plato->foto)
                            {{-- En local --}}
                            {{-- {{ url('storage/' . $plato->foto->url) }} --}}
                            {{-- A la hora de subir el proyecto a Heroku --}}
                            {{ url('storage/' . $plato->foto->url) }}

                        @else
                            https://cdn.pixabay.com/photo/2021/02/06/19/29/pancakes-5989136_1280.jpg
                            @endif)">

                            <div class="w-full h-full px-8 flex flex-col justify-center">
                                <div>
                                    Categoria:
                                    <a href="{{ route('platos.categoria', [$plato->categoria, $plato->restaurante]) }}"
                                        class="inline-block px-3 h-6 bg-{{ $plato->categoria->color }}-600 text-white rounded-full">
                                        {{ $plato->categoria->nombre }}
                                    </a>
                                </div>

                                <div>
                                    Restaurante:
                                    <a href="{{ route('platos.restaurante', $plato->restaurante) }}"
                                        class="inline-block px-3 h-6 bg-{{ $plato->restaurante->color }}-600 text-white rounded-full">
                                        {{ $plato->restaurante->nombre }}
                                    </a>
                                </div>

                                <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                                    <a href="{{ route('platos.show', $plato) }}">
                                        {{ $plato->nombre }}
                                    </a>
                                </h1>
                            </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $platos->links() }}
            </div>
        </div>
    </x-app-layout>
@else
    <x-app-layout>
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-bold text-xl text-black-800 leading-tight">
                    Restaurante a domicilio
                </h2>
            </div>
        </header>

        <div class="container py-8 text-center text-gray-600 mb-5 font-mono text-xl flex h-96 justify-center items-center">
            ESTA ACCIÓN SOLO ESTÁ PERMITIDA A LOS CLIENTES
        </div>
    </x-app-layout>
@endcan
