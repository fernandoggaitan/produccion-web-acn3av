<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $task->id }}
    </th>
    <td class="px-6 py-4">
        <flux:select wire:model="status_id" wire:change="changeStatus()">
            @foreach ($statuses as $s)
                <option value="{{ $s->id }}"> {{ $s->name }} </option>
            @endforeach
        </flux:select>
        <div wire:loading wire:target="changeStatus"> 
            Modificando estado...
        </div>
    </td>
    <td class="px-6 py-4">
        <flux:input type="text" wire:model="title" wire:blur="changeTitle()" class="mb-1" value="{{ $task->title }}" />
        <div wire:loading wire:target="changeTitle"> 
            Modificando Título...
        </div>
    </td>
    <td class="px-6 py-4">
        <button type="button"
            wire:click="destroy()"
            class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-red-700 rounded-e-lg hover:bg-red-700 focus:z-10 focus:ring-2 focus:ring-red-500 focus:text-white dark:bg-red-700 dark:border-red-600 dark:hover:bg-red-600 dark:focus:ring-red-400">
            Eliminar
        </button>
    </td>
</tr>