<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($platos as $plato)
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif" style="background-image:
                    url({{ url('storage/' . $plato->foto->url) }})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            <a href=""
                                class="inline-block px-3 h-6 bg-{{ $plato->categoria->color }}-600 text-white rounded-full">
                                {{ $plato->categoria->nombre }}
                            </a>
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold">
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
