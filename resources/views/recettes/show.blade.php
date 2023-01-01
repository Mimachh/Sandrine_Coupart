<x-app-layout>
    @livewire('button-back')

    <div class="pb-12">
        <div class="bg-perso rounded-lg shadow-xl container mx-auto space-y-6 pb-10">
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

                        <div class="flex justify-center items-center">
                            <div><h3 class="font-semibold px-2">Note Moyenne </h3></div>
                            @for($i = 0; $i < $avgRate; $i++)
                                <div>
                                    <svg class='flex w-10 h-10' viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_iconCarrier"><path d="m7.68 26.92a81.36 81.36 0 0 1 9.32-3.35 46.42 46.42 0 0 1 5.66-1.06s2.28-5.09 3.59-7.66 2.16-4.28 3.6-4.43 4.31 4.43 5.71 6.84 2.6 4.41 2.6 4.41 9.72.9 13.22 1.06 4.78.25 5.15 1.19-8 7-9.68 8.31a21.53 21.53 0 0 0 -2.69 2.5s1.78 6.4 2.94 11.06 1.65 6.41 1.12 7.31-2.16.41-3.56-.37-7.56-4.78-9.88-6.1-3.18-1.21-3.34-1.18-8.81 4.62-11.56 6.15-4.26 1.57-4.88 1.4-.31-1.78-.09-3 3.69-13.6 3.69-13.78a44.64 44.64 0 0 0 -7-5.57c-2.6-1.65-3.54-2.05-3.76-2.23s-.66-1.29-.16-1.5z" fill="#1d1d1b"></path><path d="m10.87 27.45c.21-.35 6.44-2.38 9.22-3s3.28-.56 3.43-.69 2.82-5.59 4.19-8.12 1.88-3.16 2.1-3.16a81.12 81.12 0 0 1 5.19 7.72c1.27 2.25 1.52 2.8 1.71 2.8s9.35.81 12.5 1 4.63.41 4.5.63-5.47 4.12-8 6.31-3.71 2.98-3.65 3.35 1.53 6.38 1.43 6.31a25.89 25.89 0 0 0 -3.49-1.6c-.12.12-.65.84-.4 1.09s4.12 2 4.12 2.19.32 1.69.32 1.69-5.25-3-5.47-3-.88.56-.72.78 6.31 3.56 6.47 3.78a5.48 5.48 0 0 1 .56 1.53c-.09 0-7.72-4.5-8-4.44s-.75.94-.66 1 8.91 5.19 9.07 5.44.87 2 .68 2-7.59-4.34-10.4-5.9-3.47-1.79-4-1.75a121.69 121.69 0 0 0 -11.47 5.75c-2.16 1.31-3 1.56-3.07 1.4s2.44-10.06 3-12.5.79-2.87.16-3.65a27.46 27.46 0 0 0 -5.47-4.22c-2.6-1.62-3.95-2.59-3.85-2.74z" fill="#9ffa45"></path><path d="m27.06 21c-.33-.33 2.18-4.69 2.31-4.69s.81.16.87.41a32.48 32.48 0 0 1 -2 4.72 3.18 3.18 0 0 1 -1.18-.44z" fill="#1d1d1b"></path></g></svg>                        
                                </div>
                            @endfor
                            <p>({{ $recette->ratings->count() }})</p>
                        </div>

                    </div>
                <!-- / Photo -->

                <!-- Title / Description -->
                    <div class="space-y-6 text-center col-start-2 col-span-4  md:col-start-3 md:col-span-2 mt-4">
                    <div class="bg-gray-100 rounded-full px-3 flex items-center align-center justify-between w-full min-w-0 ">
                        <h2 class="text-gray-800 text-5xl font-test italic">{{ $recette->title }}</h2>
                        <div>
                            <livewire:like :recette="$recette">
                        </div>
                    </div>
                        <h3 class="text-gray-700 text-lg">{{ $recette->description }}</h3>
                    </div>
                <!-- / Title / Description -->
            </div>

            <div class="text-center grid grid-cols-6 gap-4">
                @if($recette->regimes->count() > 0)
                <div class="bg-gray-300 rounded-full col-start-1 col-end-4 md:col-start-2 md:col-end-4">
                    <p class="underline italic">S'intégre au(x) régime(s) : </p>
                    <ul>
                        @foreach($recette->regimes as $regime)
                            <li class="text-blue-800">{{ $regime->type }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if($recette->allergenes->count() > 0)
                <div class="bg-red-300 rounded-full col-end-8 col-start-4 col-span-4 md:col-start-4 md:col-end-6 md:col-span-2">
                    <p class="underline font-bold">Contient des allergènes :</p>
                    <ul>
                        @foreach($recette->allergenes as $allergene)
                            <li class="text-red-900">{{ $allergene->name }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
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
                    <div class="bg-red-100 rounded-full pb-2">
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
        <div class="bg-white container rounded-lg mx-auto space-y-6 pb-10 my-4">
            <div class="px-5">
                @livewire('patient.rate', ['recette' => $recette], key($recette->id))
            </div>
        </div>
    </div>

</x-app-layout>
