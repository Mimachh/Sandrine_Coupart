
<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div x-data="{ open: false }">
                <x-jet-button x-on:click="open = ! open">Ouvrir le formulaire</x-jet-button>
                <form x-show="open" x-transition>
                    <div class="mb-3">
                        <label for="title">Titre</label>
                        <input type="text" wire:model="state.title" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <input type="text" wire:model="state.description" id="description">
                    </div>
                    <div class="mb-3">
                        <label for="preparation">Temps de préparation</label>
                        <input type="time" wire:model="state.preparation" id="preparation">
                    </div>
                    <div class="mb-3">
                        <label for="rest">Temps de repos</label>
                        <input type="time" wire:model="state.rest" id="rest">
                    </div>
                    <div class="mb-3">
                        <label for="cooking">Temps de cuisson</label>
                        <input type="time" wire:model="state.cooking" id="cooking">
                    </div>
                    <div class="mb-3">
                        <label for="ingredients">Liste des ingrédients</label>
                        <small> Ecrire de préférence sous forme de liste </small>
                        <textarea class="w-full" wire:model="state.ingredients" id="ingredients"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="steps">Les étapes</label>
                        <textarea class="w-full" wire:model="state.steps" id="steps"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="patient_only">Pour patient uniquement ?</label>
                        <input type="checkbox" wire:model="state.patient_only" id="patient_only" value="1">
                    </div>
                    <div class="mb-3">
                        <label for="allergenes">Liste des allergènes </label>
                        @foreach($allergenes as $index => $allergene)
                            <div wire:key="allergene-field-{{$allergene->id}}">
                                <label>{{ $allergene->name }}</label>
                                <input type="checkbox" wire:model="state.allergenes_id.{{ $index }}" id="allergenes" value="{{ $allergene->id }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
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


