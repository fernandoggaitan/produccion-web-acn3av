<x-layouts.app :title="$course->title">

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">      
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course) }}" method="POST">

        @csrf

        @method('PUT')

        <flux:input
            name="title"
            :label="__('Título')"
            type="text"
            placeholder="Ingrese el título del curso"
            class="mb-3"
            value="{{ old('title', $course->title) }}"
        />
        <flux:input
            name="price"
            :label="__('Precio')"
            type="number"
            placeholder="Ingrese el precio del curso"
            class="mb-3"
            value="{{ old('price', $course->title) }}"
        />
        <flux:textarea name="description" :label="__('Descripción')" class="mb-3" placeholder="Ingrese la descripción del curso">{{ old('description', $course->description) }}</flux:textarea>
        <flux:button variant="primary" type="submit" class="w-full"> Modificar curso </flux:button>
    </form>

</x-layouts.app>