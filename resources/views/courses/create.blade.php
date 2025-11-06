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
            :label="__('courses.field-title')"
            type="text"
            class="mb-3"
            value="{{ old('title') }}"
        />
        <flux:input
            name="price"
            :label="__('courses.field-price')"
            type="number"
            class="mb-3"
            value="{{ old('price') }}"
        />
        <flux:textarea name="description" :label="__('courses.field-description')" class="mb-3">{{ old('price') }}</flux:textarea>

        <flux:input type="file" name="image" class="mb-3" />

        <flux:button variant="primary" type="submit"> {{ __('courses.btn-add') }} </flux:button>
        <x-produccion.enlace href="{{ route('courses.index') }}"> {{ __('courses.btn-back') }} </x-produccion.enlace>
    </form>

</x-layouts.app>