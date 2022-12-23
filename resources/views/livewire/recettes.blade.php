
<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div x-data="{ open: false }">
                <x-jet-button x-on:click="open = ! open">Ouvrir le formulaire</x-jet-button>
                <form x-cloak x-show="open" x-transition class="bg-white rounded-lg px-4 py-5 mt-2 shadow hover:shadow-xl">

                    <div class="text-center flex space-x-10 justify-center mb-5">
                        <!-- Title -->
                        <div class="mb-3">
                            <x-jet-label class="underline font-semibold" for="title">Titre</x-jet-label>
                            <x-jet-input type="text" wire:model="state.title" id="title"/>
                            @error('title') <small class="text-red-600 italic">{{ $message }}</small> @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <x-jet-label class="underline font-semibold" for="description">Description</x-jet-label>
                            <x-jet-input type="text" wire:model="state.description" id="description"/>
                            @error('description') <small class="text-red-600 italic">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- TIME GROUP -->
                    <div class="text-center flex space-x-10 justify-center mb-5">
                        <!-- Preparation -->
                        <div class="mb-3 space-y-2">
                            <x-jet-label class="underline font-semibold" for="preparation">Temps de préparation</x-jet-label>
                            <x-jet-input type="time" wire:model="state.preparation" id="preparation"/>
                            @error('preparation') <small class="text-red-600 italic">{{ $message }}</small> @enderror
                        </div>

                        <!-- Rest -->
                        <div class="mb-3 space-y-2">
                            <x-jet-label class="underline font-semibold" for="rest">Temps de repos</x-jet-label>
                            <x-jet-input type="time" wire:model="state.rest" id="rest"/>
                            @error('rest') <small class="text-red-600 italic">{{ $message }}</small> @enderror
                        </div>

                        <!-- Cooking -->
                        <div class="mb-3 space-y-2">
                            <x-jet-label class="underline font-semibold" for="cooking">Temps de cuisson</x-jet-label>
                            <x-jet-input type="time" wire:model="state.cooking" id="cooking"/>
                            @error('cooking') <small class="text-red-600 italic">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="flex text-center space-x-20 justify-center mb-5">
                        <!-- Ingredients -->
                        <div class=" w-full mb-3">
                            <x-jet-label for="ingredients">Liste des ingrédients</x-jet-label>
                            <textarea class="w-full shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="state.ingredients" id="ingredients"></textarea>
                            @error('ingredients') <small class="text-red-600 italic">{{ $message }}</small> @enderror  
                        </div>

                        <!-- Steps -->
                        <div class="w-full mb-3">
                            <x-jet-label for="steps">Les étapes</x-jet-label>
                            <textarea class="w-full shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="state.steps" id="steps"></textarea>
                            @error('steps') <small class="text-red-600 italic">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- CHECKBOXES GROUP -->
                    <div class="flex space-x-10 justify-center mb-5">
                        <!-- Allergenes -->
                        <div class="mb-3">
                            <x-jet-label class="underline font-semibold" for="allergenes">Liste des allergènes </x-jet-label>
                            @foreach($allergenes as $index => $allergene)
                                <div class="flex space-x-2 space-y-2 items-center" wire:key="allergene-field-{{$allergene->id}}">
                                    <div>
                                        <x-jet-input type="checkbox" wire:model.defer="state.allergenes_id.{{ $index }}" value="{{ $allergene->id }}"/>
                                    </div>
                                    <div>
                                        <x-jet-label for="{{$allergene->name}}">{{ $allergene->name }}</x-jet-label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Regime -->
                        <div class="mb-3">
                            <x-jet-label class="underline font-semibold" for="regimes">Type de régimes </x-jet-label>
                            @foreach($regimes as $index => $regime)
                                <div class="flex space-x-2 space-y-2 items-center" wire:key="regime-field-{{$regime->id}}">
                                    <div>
                                        <x-jet-input type="checkbox" wire:model.defer="state.regimes_id.{{ $index }}" value="{{ $regime->id }}"/>
                                    </div>
                                    <div>
                                        <x-jet-label>{{ $regime->type }}</x-jet-label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Patient_only -->
                        <div class="mb-3">
                            <x-jet-label class="underline font-semibold">Visible par patient uniquement ?</x-jet-label>
                            <div class="flex space-x-2 space-y-2 items-center">
                                <div>
                                    <x-jet-input type="checkbox" wire:model.defer="state.patient_only" id="patient_only" value="1"/>
                                </div>
                                <div>
                                <x-jet-label for="patient_only">Oui</x-jet-label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="mb-3 text-center">
                        <x-jet-danger-button type="reset" wire:click.prevent="cancel">Annuler</x-jet-danger-button>
                        @if ($updateMode)
                            <x-jet-button class="bg-blue-600" type="submit" wire:click.prevent="update">Mettre à jour</x-jet-button>
                        @else
                            <x-jet-button class="bg-green-600" type="submit" wire:click.prevent="store">Enregistrer</x-jet-button>
                        @endif
                    </div>
                </form>
            </div>
            
            <div class="border-b border-gray-200 shadow">
                <h3 class="text-green-600 text-lg text-center mb-5"> {{ $recettes->count() }} Recette(s) en ligne</h3>
                <table class="divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr class="px-6 py-2 text-xs text-gray-500 divide-x divide-gray-300">
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Description</th>
                            <th scope="col">Temps de préparation</th>
                            <th scope="col">Temps de repos</th>
                            <th scope="col">Temps de cuisson</th>
                            <th scope="col">Ingrédients</th>
                            <th scope="col">Etapes</th>
                            <th scope="col">Type de régime</th>
                            <th scope="col">Les allergènes</th>
                            <th scope="col">Visible par ?</th>
                            <th scope="col"> -- </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        @foreach ($recettes as $recette)
                            <tr class="whitespace-nowrap text-xs text-center text-gray-500 divide-x">
                                <th scope="row">{{ $recette->id }}</th>
                                <td>{{ $recette->title}}</td>
                                <td>{{ $recette->description }}</td>
                                <td>{{ $recette->preparation }}</td>
                                <td>{{ $recette->rest }}</td>
                                <td>{{ $recette->cooking }}</td>
                                <td>{{ $recette->ingredients }}</td>
                                <td>{{ $recette->steps }}</td>
                                <td>
                                    <ol>
                                    @foreach($recette->regimes as $regime)
                                        <li>{{ $regime->type}}</li>
                                    @endforeach
                                    </ol>
                                </td>
                                <td>
                                    <ul>
                                    @foreach($recette->allergenes as $allergene)
                                        <li>{{ $allergene->name}}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>@if($recette->patient_only === 1)
                                        Patients
                                    @else
                                        Tous
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <button wire:click.prevent="edit({{ $recette->id }})" type="button" class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</button>
                                    <button wire:click.prevent="delete({{ $recette->id }})" type="button" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


