<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div x-data="{ open: false }">
                <x-jet-button x-on:click="open = ! open">Ouvrir le formulaire</x-jet-button>
                <form x-cloak x-show="open" x-transition class="bg-white rounded-lg px-4 py-5 mt-2 shadow hover:shadow-xl">
                        <!-- Name -->
                        <div class="mb-3 text-center space-y-2">
                            <x-jet-label class="underline font-semibold" for="type">Type de régime alimentaire</x-jet-label>
                            <x-jet-input type="text" wire:model="state.type" id="type"/>
                            @error('type') <small class="text-red-600 italic">{{ $message }}</small> @enderror
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
                <h3 class="text-green-600 text-lg text-center mb-5"> {{ $regimes->count() }} regime(s) répertorié(s)</h3>
                <table class="divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr class="px-6 py-2 text-xs text-gray-500 divide-x divide-gray-300">
                            <th class="px-4 py-4" scope="col">#</th>
                            <th class="px-6 py-4" scope="col">Type de régime</th>
                            <th class="px-6 py-4" scope="col">Liste des patients concernés</th>
                            <th class="px-6 py-4" scope="col">Liste des recettes associées</th>
                            <th class="px-6 py-4" scope="col"> -- </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        @foreach ($regimesWithPagination as $regime)
                            <tr class="whitespace-nowrap text-xs text-center text-gray-500 divide-x">
                                <th scope="row">{{ $regime->id }}</th>
                                <td>{{ $regime->type}}</td>
                                <td>
                                    <ul>
                                        @foreach($regime->users as $patient)
                                            <li>
                                                {{ $patient->name }} {{ $patient->last_name }}
                                            </li>
                                        @endforeach
                                    </ul>    
                                </td>
                                <td>
                                    <ul>
                                        @foreach($regime->recettes as $recette)
                                            <li>
                                                {{ $recette->title }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4">
                                    <button wire:click.prevent="edit({{ $regime->id }})" type="button" class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Modifier</button>
                                    <button wire:click.prevent="delete({{ $regime->id }})" type="button" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-white border-t px-4 py-2">
                    {{ $regimesWithPagination->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
