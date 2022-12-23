<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-center text-gray-100">Gérer les rôles de vos utilisateurs</h2>
    </x-slot>
    <div class="container mt-5 pb-5 mx-auto">

        <div>
            @livewire('admin.users')
        </div>
    </div>
</x-app-layout>