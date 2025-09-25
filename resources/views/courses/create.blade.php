<x-layouts.app :title="__('Crear curso')">

    <form action="{{ route('courses.store') }}" method="POST">
        <flux:input
            name="title"
            :label="__('Título')"
            type="text"
            placeholder="Ingrese el título del curso"
            class="mb-3"
        />
        <flux:input
            name="price"
            :label="__('Precio')"
            type="number"
            placeholder="Ingrese el precio del curso"
            class="mb-3"
        />
        <flux:textarea name="description" :label="__('Descripción')" class="mb-3" placeholder="Ingrese la descripción del curso"></flux:textarea>
        <flux:button variant="primary" type="submit" class="w-full"> Agregar curso nuevo </flux:button>
    </form>

</x-layouts.app>