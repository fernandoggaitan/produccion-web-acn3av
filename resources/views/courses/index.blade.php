<x-layouts.app :title="__('Lista de cursos')">

    <div class="mb-3">
        <x-produccion.enlace href="{{ route('courses.create') }}"> Crear curso nuevo </x-produccion.enlace>
    </div>

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
                    <th scope="col" class="px-6 py-3">
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
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $courses->links() }}

</x-layouts.app>