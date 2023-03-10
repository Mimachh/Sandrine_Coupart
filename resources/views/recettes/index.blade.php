<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-center text-green-200">Liste des Recettes</h1>
    </x-slot>

    @auth
        @if(auth()->user()->role->name === 'Admin')
            <!-- FOR ADMIN RECEIPTS -->
            <div class="mr-12 ml-8 mb-4 grid grid-cols-1 gap-4 lg:grid-cols-3 sm:grid-cols-2">
                @forelse($recettes as $recette)
                    <div class="w-full px-4 max-h-62 lg:px-0">
                        admin
                        <div class="p-3 bg-white rounded shadow-md hover:shadow-2xl">
                            <div class="">
                                <div class="rounded aspect-w-1 aspect-h-1  overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                    @if(isset($recette->photo))
                                    <img src="{{ asset('storage/recettes_photos/' . $recette->photo) }}" alt="Photo de la recette" 
                                    class="mx-auto w-full h-full rounded  rounded-lg object-cover object-center group-hover:opacity-75">
                                    @else
                                    <img src="https://cdn.pixabay.com/photo/2018/02/25/07/15/food-3179853__340.jpg" alt="Butter photo"
                                        class="object-fill w-full h-full rounded">
                                    @endif
                                </div>
                                <div class="flex-auto p-2 justify-evenly">
                                    <div class="flex flex-wrap">
                                        <div class="flex items-center justify-between w-full min-w-0 ">
                                            <h2 class="mr-auto text-lg cursor-pointer hover:text-gray-900 ">{{ $recette->title }}</h2>
                                            <livewire:like :recette="$recette"> ({{ $recette->fav->count()}})
                                        </div>
                                        
                                        <!-- Rating -->
                                        <div>
                                            <p class="text-sm">
                                                @if($recette->ratings->count() > 0)
                                                Note Moyenne :
                                                @endif
                                                @for($i = 0; $i < $avgRate; $i++)
                                               <strong>???</strong> 
                                                @endfor
                                            </p>
                                        </div>
                                        <!-- / Rating -->

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
                                    <h3 class="mb-3">Pas d'allerg??nes en particulier</h3>
                                    @endif
                                    <button class="button-perso inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3">
                                        <a class="py-2 px-20" href="{{ route('recettes.show', $recette) }}">Voir la recette</a> 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>pas de recette</h1>
                @endforelse
            </div>
            <div class="mr-12 ml-8 pb-4">
                {{ $recettes->links() }}
            </div>
            <!-- / FOR ADMIN RECEIPTS -->
        @else
            <!-- FOR PATIENTS RECEIPTS -->
            <div class="mr-12 ml-8 mb-4 grid grid-cols-1 gap-4 lg:grid-cols-3 sm:grid-cols-2">
                @forelse($receipts_patients as $recette)
                    <div class="w-full px-4 max-h-62 lg:px-0">
                        patient
                        <div class="p-3 bg-white rounded shadow-md hover:shadow-2xl">
                            <div class="">
                                <div class="rounded aspect-w-1 aspect-h-1  overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                    @if(isset($recette->photo))
                                    <img src="{{ asset('storage/recettes_photos/' . $recette->photo) }}" alt="Photo de la recette" 
                                    class="mx-auto w-full h-full rounded  rounded-lg object-cover object-center group-hover:opacity-75">
                                    @else
                                    <img src="https://cdn.pixabay.com/photo/2018/02/25/07/15/food-3179853__340.jpg" alt="Butter photo"
                                        class="object-fill w-full h-full rounded">
                                    @endif
                                </div>
                                <div class="flex-auto p-2 justify-evenly">
                                    <div class="flex flex-wrap ">
                                        <div class="flex items-center justify-between w-full min-w-0 ">
                                            <h2 class="mr-auto text-lg cursor-pointer hover:text-gray-900 ">{{ $recette->title }}</h2>
                                            <livewire:like :recette="$recette">
                                        </div>
                                        
                                        <!-- Rating -->
                                        <div>
                                            <p class="text-sm">Note Moyenne : 
                                                @for($i = 0; $i < $avgRate; $i++)
                                               <strong>???</strong> 
                                                @endfor
                                            </p>
                                        </div>
                                        <!-- / Rating -->

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
                                    <h3 class="mb-3">Pas d'allerg??nes en particulier</h3>
                                    @endif
                                    <button class="button-perso inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3">
                                        <a class="py-2 px-20" href="{{ route('recettes.show', $recette) }}">Voir la recette</a> 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>pas de recette</h1>
                @endforelse
            </div>
            <div class="mr-12 ml-8 pb-4">
                {{ $receipts_patients->links() }}
            </div>
            <!-- / FOR PATIENTS RECEIPTS -->
        @endif
    @endauth

</x-app-layout>