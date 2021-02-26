<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Categoria: {{ $categoria->nombre }}</h1>

        @foreach ($platos as $plato)
            <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">

                @if ($plato->foto)
                    <img class="w-full h-80 object-cover object-center"
                        src="{{ url('storage/' . $plato->foto->url) }}" alt="">
                @else
                    <img class="w-full h-80 object-cover object-center"
                        src="https://cdn.pixabay.com/photo/2021/02/06/19/29/pancakes-5989136_1280.jpg" alt="">
                @endif

                <div class="px-6 py-4">
                    <h1 class="font-bold text-xl mb-2">
                        <a href="{{ route('platos.show', $plato) }}">{{ $plato->nombre }}</a>
                    </h1>

                    <div class="text-gray-700 text-base">
                        {!! $plato->nombre !!}
                    </div>

                    <div class="px-6 pt-4 pb-2">
                        <a href="{{ route('platos.restaurante', $plato->restaurante) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700">
                            {!! $plato->restaurante->nombre !!}
                        </a>
                    </div>
                </div>
            </article>
        @endforeach

        <div class="m-4">
            {{ $platos->links() }}
        </div>
    </div>
</x-app-layout>
