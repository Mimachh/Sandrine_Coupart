<x-app-layout>
    @livewire('button-back')

    <div class="pb-12">
        <div class="bg-white rounded-lg shadow-xl container mx-auto space-y-6 pb-10">
            <div class="grid grid-cols-6 gap-4">
                <!-- Photo -->
                    <div class="px-2 md:px-12 md:py-4 md:col-start-2 col-start-1 col-span-6 md:col-span-4 mt-4">
                        @if(isset($recette->photo))
                            <img src="{{ asset('storage/recettes_photos/' . $recette->photo) }}" alt="Photo de la recette" 
                                class="shadow-xl mx-auto w-full h-full rounded-lg object-cover object-center group-hover:opacity-75">
                        @else
                            <img src="https://cdn.pixabay.com/photo/2018/02/25/07/15/food-3179853__340.jpg" alt="Butter photo"
                                class="shadow-xl object-fill w-full h-full rounded">
                        @endif
                    </div>
                <!-- / Photo -->

                <!-- Title / Description -->
                    <div class="space-y-6 text-center col-start-2 col-span-4  md:col-start-3 md:col-span-2">
                        <h2 class="text-gray-800 text-5xl font-test italic">{{ $recette->title }}</h2>
                        <h3 class="text-gray-700 text-xl">{{ $recette->description }}</h3>
                    </div>
                <!-- / Title / Description -->
            </div>

            <div class="text-center grid grid-cols-6 gap-4">
                <div class="bg-gray-300 rounded-full col-start-1 col-end-4 md:col-start-2 md:col-end-4">
                    <p class="underline italic">S'intégre au(x) régime(s) : </p>
                    <ul>
                        @foreach($recette->regimes as $regime)
                            <li class="text-blue-800">{{ $regime->type }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-red-300 rounded-full col-end-8 col-start-4 col-span-4 md:col-start-4 md:col-end-6 md:col-span-2">
                    <p class="underline font-bold">Contient des allergènes :</p>
                    <ul>
                        @foreach($recette->allergenes as $allergene)
                            <li class="text-red-900">{{ $allergene->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-4 md:px-6 text-center grid grid-cols-3 gap-4">
                <!-- Times -->
                    <div class="bg-red-100 rounded-full">
                        <p class="italic underline">Temps de préparation :</p> 
                        <span class="shadow hover:shadow-xl hover:bg-gray-300 bg-gray-100 px-2 rounded-xl">{{ $recette->preparationTime() }}</span>
                    </div>
                    <div class="bg-gray-100 rounded-full">
                        <p class="italic underline">Temps de repos :</p> 
                        <span class="shadow hover:shadow-xl hover:bg-red-400 bg-red-100 px-2 rounded-xl">{{ $recette->restTime() }}</span>
                    </div>
                    <div class="bg-red-100 rounded-full">
                        <p class="italic underline">Temps de cuisson :</p> 
                        <span class="shadow hover:shadow-xl hover:bg-gray-300 bg-gray-100 px-2 rounded-xl">{{ $recette->cookingTime() }}</span>
                    </div>
                <!-- / Times -->
            </div>

            <div class="grid grid-cols-6 gap-4">
                <!-- Ingredients -->
                    <div class="space-y-4 px-2 col-start-1 col-span-6 md:col-start-2 md:col-span-4 text-center">
                    <p class="underline italic">Liste des ingrédients : </p> 
                    <p>{{ $recette->ingredients }}</p>
                    </div>
                <!-- / Ingredients -->
            </div>

            <div class="grid grid-cols-6 gap-4">
                <!-- Steps -->
                    <div class="space-y-4 col-start-1 col-span-6 md:col-start-2 md:col-span-4 text-center">
                    <p class="underline italic">Les étapes : </p> 
                    <p>{{ $recette->steps }}</p>
                    </div>
                <!-- / Steps -->
            </div>
        </div>
    </div>

</x-app-layout>
