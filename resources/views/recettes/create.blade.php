<x-app-layout>
    <div class="container mt-5 mx-auto">

        <x-slot name="header">
            <h2 class="font-semibold leading-tight text-center text-gray-100">Liste des recettes disponibles sur le site</h2>
        </x-slot>

        <div>
            @livewire('recettes')
        </div>
    </div>
</x-app-layout>
