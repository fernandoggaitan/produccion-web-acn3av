<x-layouts.app :title="__('Dashboard')">
    <h1> {{ $title }} </h1>
    <ul>
        @foreach ($courses as $c)
            <li>  
                <h2> {{ $c->title }} </h2>
                <div> Precio: {{ $c->price }} </div>
            </li>
        @endforeach
    </ul>
    <x-boton> Botón 1 </x-boton>
    <x-boton> Botón 2 </x-boton>
    <x-boton> Botón 3 </x-boton>
</x-layouts.app>