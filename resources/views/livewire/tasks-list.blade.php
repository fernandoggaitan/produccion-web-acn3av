<div>

    <form class="mb-5" wire:submit="add()">
        <flux:input type="text" wire:model="title" class="mb-1" placeholder="Ingrese el título de la tarea" />
        <flux:button type="submit"> Agregar tarea </flux:button>
    </form>

    <form class="mb-5">
        <flux:input type="text" wire:model.live.debounce.500ms="search" class="mb-1" placeholder="Ingrese la tarea a buscar" />
    </form>

    <ul wire:poll.30000ms>
        @foreach ($tasks as $task)
            <li>
                <input 
                    @checked( $task->completed ) 
                    type="checkbox" 
                    wire:change="changeComplete( {{$task}} )"
                />
                {{ $task->title }}
            </li>  
        @endforeach
    </ul>

    {{ $tasks->links() }}

</div>