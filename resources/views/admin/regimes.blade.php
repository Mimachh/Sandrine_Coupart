<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-center text-gray-100">Liste des type de régimes disponibles sur le site</h2>
    </x-slot>
    <div class="container mt-5 pb-5 mx-auto">

        <div>
            @livewire('admin.regimes')
        </div>
    </div>
</x-app-layout>