<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-center text-gray-100">Liste des patients</h2>
    </x-slot>
    <div class="container mt-5 pb-5 mx-auto">

        <div>
            @livewire('admin.patients')
        </div>
    </div>
</x-app-layout>