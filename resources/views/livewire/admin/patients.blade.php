<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            @if ($updateMode)
                <form class="bg-white rounded-lg px-4 py-5 mt-2 shadow hover:shadow-xl">
                    <!-- Name LastName Mail-->
                    <div class="text-center flex space-x-10 justify-center mb-5">
                            <div class="mb-3 text-center space-y-2">
                                <div>
                                    <x-jet-label class="underline font-semibold" for="name">Nom</x-jet-label>
                                    <x-jet-input type="text" wire:model="state.name" id="name"/>
                                </div>
                                @error('name') <small class="text-red-600 italic">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3 text-center space-y-2">
                                <div>
                                    <x-jet-label class="underline font-semibold" for="last_name">Prénom</x-jet-label>
                                    <x-jet-input type="text" wire:model="state.last_name" id="last_name"/>
                                </div>
                                @error('last_name') <small class="text-red-600 italic">{{ $message }}</small> @enderror
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
                    </div>
                    <!-- Buttons -->
                    <div class="mb-3 text-center">
                        
                            <x-jet-button class="bg-blue-600" type="submit" wire:click.prevent="update">Mettre à jour</x-jet-button>
                            <x-jet-danger-button type="reset" wire:click.prevent="cancel">Annuler</x-jet-danger-button>
                        
                    </div>
                </form>
            @endif

            <h3 class="text-green-600 text-lg text-center mb-5"> {{ $patients->count() }} patient(s) répertorié(s)</h3>
            <div class="border-b border-gray-200 shadow-lg hover:shadow-2xl hover:shadow-cyan-500/60 shadow-cyan-500/50">
                <table class="divide-y divide-gray-300">
                    <thead class="bg-gray-200">
                        <tr class="px-6 py-2 text-xs text-gray-500 divide-x divide-gray-300">
                            <th class="px-4 py-4" scope="col">#</th>
                            <th class="px-6 py-4"scope="col">Nom du patient</th>
                            <th class="px-6 py-4"scope="col">Prénom du patient</th>
                            <th class="px-6 py-4" scope="col">Liste de ses allergies</th>
                            <th class="px-6 py-4" scope="col">Liste de ses régimes</th>
                            <th class="px-6 py-4" scope="col"> -- </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        @forelse ($patients as $patient)
                            <tr class="whitespace-nowrap text-xs text-center text-gray-500 divide-x">
                                <th class="bg-gray-200" scope="row">{{ $patient->id }}</th>
                                <td>{{ $patient->name}}</td>
                                <td>{{ $patient->last_name}}</td>
                                <td>
                                    <ul>
                                        @foreach($patient->allergenes as $allergene)
                                            <li class="flex justify-between px-10 ">
                                                <div>
                                                    {{ $allergene->name }}
                                                </div>
                                                <div>
                                                    <button wire:click.prevent="deleteThisAllergene({{ $patient->id }},{{ $allergene->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </li>
                                        @endforeach
                                        @if($patient->allergenes->count() > 0)
                                        <button wire:click.prevent="deleteAllergene({{ $patient->id }})" type="button" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Supprimer ses allergènes</button>
                                        @endif
                                    </ul>    
                                </td>
                                <td>
                                    <ul>
                                        @foreach($patient->regimes as $regime)
                                        <li class="flex justify-between px-10 ">
                                                <div>
                                                    {{ $regime->type }}
                                                </div>
                                                <div>
                                                    <button wire:click.prevent="deleteThisRegime({{ $patient->id }},{{ $regime->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4">
                                    <button wire:click.prevent="edit({{ $patient->id }})" type="button" class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Modifier</button>
                                </td>
                            </tr>
                        @empty
                         Aucun patient répertorié
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
