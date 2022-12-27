<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-center text-green-200">Liste des Recettes</h1>
    </x-slot>

    @forelse(auth()->user()->regimes as $regime)
    <h1 class=" text-center text-indigo-700 font-semibold my-4">Pour les régimes : <span class="text-red-600 text-semibold italic">{{ $regime->type }}</span></h1>
    <div class="ml-4 grid grid-cols-1 gap-4 lg:grid-cols-3 sm:grid-cols-2">
        @forelse($regime->recettes as $recette)
            <div class="w-full px-4 lg:px-0">
                <div class="p-3 bg-white rounded shadow-md hover:shadow-2xl">
                    <div class="">
                        <div class="relative w-full mb-3 h-62 lg:mb-0">
                            <img src="https://cdn.pixabay.com/photo/2018/02/25/07/15/food-3179853__340.jpg" alt="Just a flower"
                                class="object-fill w-full h-full rounded">
                        </div>
                        <div class="flex-auto p-2 justify-evenly">
                            <div class="flex flex-wrap ">
                                <div class="flex items-center justify-between w-full min-w-0 ">
                                    <h2 class="mr-auto text-lg cursor-pointer hover:text-gray-900 ">{{ $recette->title }}</h2>
                                </div>
                                <div class="my-2">
                                    <p class="text-gray-700 text-md mb-4">
                                        {{ $recette->description }}
                                    </p>
                                </div>
                            </div>
                            @if($recette->allergenes->count() > 0)
                                <div class="mb-3 px-2 py-2 border border-2 border-red-600">
                                    <h3 class="text-red-600 font-bold">Attention !</h3>
                                    <p class="underline text-gray-700 text-base">Cette recette ne convient pas aux personnes allergiques :</p>
                                    <ul>
                                        @foreach($recette->allergenes as $allergene)
                                        <li class="text-gray-700 font-bold">
                                            - {{ $allergene->name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else 
                            <h3 class="mb-3">Pas d'allergènes en particulier</h3>
                            @endif
                            <div class="mt-5 text-sm text-center text-white font-semibold">
                                <a class="px-2 py-2 rounded-full bg-indigo-500 hover:bg-red-800 hover:text-black hover:shadow-lg" href="{{ route('recettes.show', $recette) }}">Voir la recette</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h1>pas de recette</h1>
        @endforelse
    </div>
    <x-jet-section-border />
    @empty
        <h1>rien</h1>
    @endforelse

    
</x-app-layout>