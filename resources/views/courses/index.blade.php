<x-layouts.app :title="__('Lista de cursos')">

    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400">
            {{ session('status') }}
        </div>
    @endif

    <div class="mb-3">
        <x-produccion.enlace href="{{ route('courses.create') }}"> Crear curso nuevo </x-produccion.enlace>
    </div>

    <form action="{{ route('courses.index') }}" method="GET" class="mb-5">
        <flux:input
            name="search"
            :label="__('Título')"
            type="text"
            placeholder="Ingresear el título a buscar"
            class="mb-3"
            value="{{ $search }}"
        />
        <flux:button variant="primary" type="submit"> Buscar </flux:button>
        @if ($search)
            <x-produccion.enlace href="{{ route('courses.index') }}"> Limpiar búsqueda </x-produccion.enlace>
        @endif
    </form>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $c)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $c->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $c->price_format() }}
                        </td>
                        <td class="px-6 py-4">
                            <x-produccion.enlace href="{{ route('courses.show', $c) }}"> Ver </x-produccion.enlace>
                        </td>
                         <td class="px-6 py-4">
                            <x-produccion.enlace href="{{ route('courses.edit', $c) }}"> Editar </x-produccion.enlace>
                        </td>
                         <td class="px-6 py-4">
                            <form action="{{ route('courses.destroy', $c) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-produccion.btn-danger type="submit"> Eliminar </x-produccion.btn-danger>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $courses->appends( ['search' => $search] )->links() }}

</x-layouts.app>