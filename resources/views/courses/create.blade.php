<x-layouts.app :title="__('Crear curso')">

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">      
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <flux:input
            name="title"
            :label="__('Título')"
            type="text"
            placeholder="Ingrese el título del curso"
            class="mb-3"
            value="{{ old('title') }}"
        />
        <flux:input
            name="price"
            :label="__('Precio')"
            type="number"
            placeholder="Ingrese el precio del curso"
            class="mb-3"
            value="{{ old('price') }}"
        />
        <flux:textarea name="description" :label="__('Descripción')" class="mb-3" placeholder="Ingrese la descripción del curso">{{ old('price') }}</flux:textarea>

        <flux:input type="file" name="image" class="mb-3" />

        <flux:button variant="primary" type="submit"> Agregar curso nuevo </flux:button>
        <x-produccion.enlace href="{{ route('courses.index') }}"> Volver </x-produccion.enlace>
    </form>

</x-layouts.app>