<div class=" sm:px-6 lg:px-8 opacity-90">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!-- Boutons -->
                
                
        <div class="flex justify-around rounded-b-full border-b-2 pb-4 pr-4">  
                
            @if($currentPage === 1)
                <button type="button" wire:click="goToPageFav"><h2 class="ml-5 mt-5 font-semibold text-md md:text-lg text-blue-800">Mes favoris</h2></button>
            @else
                <button type="button" wire:click="goToPageFav"><h2 class=" ml-5 mt-5 font-semibold text-md md:text-lg  text-gray-800">Mes favoris</h2></button>
            @endif

            @if($currentPage === 2)
                <button type="button"  wire:click="goToPageRate"><h2 class="ml-5 mt-5 font-semibold text-md md:text-lg  text-blue-800" >Mes notes</h2></button>
            @else
                <button type="button" wire:click="goToPageRate" ><h2 class="ml-5 mt-5 font-semibold text-md md:text-lg  text-gray-800" >Mes notes</h2></button>
            @endif
                    
                    
            @if($currentPage === 3)
                <button type="button" ><h2 class="ml-5 mt-5 font-semibold text-md md:text-lg  text-blue-800">Mes commentaires</h2></button>
            @else
                <button type="button" ><h2 class="ml-5 mt-5 font-semibold text-md md:text-lg  text-gray-800">Mes commentaires</h2></button>
            @endif

            @if($currentPage === 4)
                <button type="button"><h2 class="ml-5 mt-5 font-semibold text-md md:text-lg  text-blue-800">Mes messages</h2></button>
            @else
                <button type="button"><h2 class="ml-5 mt-5 font-semibold text-md md:text-lg  text-gray-800">Mes messages</h2></button>
            @endif              
        </div>


        <div class="mr-12 ml-8 mb-4 grid grid-cols-1 gap-4 lg:grid-cols-3 sm:grid-cols-2">
            @if($currentPage === 1)
                @foreach(auth()->user()->fav as $recette)
                    <div class="w-full px-4 max-h-62 lg:px-0">
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
                                            <livewire:like :recette="$recette"> ({{ $recette->fav->count()}})
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
                                    <button class="button-perso inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3">
                                        <a class="py-2 px-20" href="{{ route('recettes.show', $recette) }}">Voir la recette</a> 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
            @if($currentPage === 2)
            coucou
            @endif
        </div>
    </div>
</div>
