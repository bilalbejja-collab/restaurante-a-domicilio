<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-500">{{ $plato->nombre }}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{ $plato->nombre }}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Conetenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{ url('storage/' . $plato->foto->url) }}" alt="">
                </figure>

                <div class="text-base text-gray-500 mb-2">
                    {{ $plato->descripcion }}
                </div>
            </div>

            {{-- Conetenido relacionado --}}
            <aside>
                <h1 class="text-2xl text-bold text-gray-600 mb-4">Más en {{ $plato->categoria->nombre }}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('platos.show', $similar) }}">
                                <img class="w-36 h-20 object-cover object-center" src="{{ url('storage/' . $similar->foto->url) }}" alt="">

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
