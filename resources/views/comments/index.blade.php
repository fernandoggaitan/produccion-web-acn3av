<x-layouts.app :title="__('Lista de comentarios')">

    <ul>
        @foreach ($comments as $c)
            <li class="mb-5">
                <strong> {{ $c->user->name }} dice: </strong>
                {{ $c->comment }}
            </li>
        @endforeach
    </ul>

</x-layouts.app>