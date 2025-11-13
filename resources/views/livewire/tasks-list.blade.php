<div>

    <form class="mb-5" wire:submit="add()">
        <flux:input type="text" wire:model="title" class="mb-1" placeholder="Ingrese el título de la tarea" />
        <flux:button type="submit"> Agregar tarea </flux:button>
    </form>

    <form class="mb-5">
        <flux:input type="text" wire:model.live.debounce.500ms="search" class="mb-1" placeholder="Ingrese la tarea a buscar" />
    </form>

    @if ($msj)
        <div class="mx-3"> {{ $msj }} </div>
    @endif

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3" style="width: 10%;">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 40%;">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3" style="width: 40%;">
                        Nombre
                    </th>                    
                    <th scope="col" class="px-6 py-3" style="width: 10%;">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    @livewire(
                        'TaskItem', 
                        [
                            'task' => $task,
                            'statuses' => $statuses
                        ], 
                        key($task->id))
                @endforeach
            </tbody>
        </table>
    </div>


    {{ $tasks->links() }}

</div>