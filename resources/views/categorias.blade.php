<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-black-800 leading-tight">
            Restaurante BILAL BEJJA
        </h2>
    </x-slot>

    <div class="mx-auto sm:px-6 lg:px-8 m-10">
        <a href="/categorias/create">
            <x-jet-button>
                Nueva categoria
            </x-jet-button>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden max-w-2xl mx-auto mb-8">
        <table>
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr class="text-xs font-medium text-gray-500 uppercase text-left tracking-wider">
                    <th class="px-6 py-3" style="width: 300px">ID</th>
                    <th class="px-6 py-3" style="width: 400px">Nombre</th>
                </tr>
            </thead>
            @each('categoria.show', $categorias, 'categoria')
        </table>

        <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
            {{ $categorias->links() }}
        </div>

    </div>
</x-app-layout>
