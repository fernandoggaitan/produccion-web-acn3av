<div>

    <ul class="mb-5">
        <li> Cantidad de veces que se montó el componente: {{ $count_mount }} </li>
        <li> Cantidad de veces que se renderizó el componente: {{ $count_render }} </li>
    </ul>

    <form class="mb-5" wire:submit="add()">
        <flux:input type="text" wire:model="title" class="mb-1" placeholder="Ingrese el título de la tarea" />
        <flux:select>
            <option value=""></option>
            @foreach ($profes as $profe)
                <option value="{{ $profe->id }}"> {{ $profe->name }} </option>
            @endforeach
        </flux:select>
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

</div>