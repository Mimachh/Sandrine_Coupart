<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
                @if($updateMode || $createMode)
                <form class="bg-white rounded-lg px-4 py-5 mt-2 shadow hover:shadow-xl">
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
                @endif
                
            <h3 class="text-green-600 text-lg text-center mb-5"> {{ $regimes->count() }} regime(s) répertorié(s)</h3>
            
            <div class="mb-2 text-cyan-600">
                <button type=button wire:click="openForm" class="flex inline space-x-2">
                    <svg class="h-7 w-7" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0"><g id="SVGRepo_bgCarrier" stroke-width="0"><path transform="translate(-2.4,-2.4)" d="M14.4,24.966898389765994C16.332572898045424,24.972614404230473,18.2854130665298,24.977230680355945,20.043706303392536,24.17518606047261C21.89426045767728,23.331056667189447,23.294462222008967,21.842015918150224,24.624383669737057,20.303050664020702C26.189053683705577,18.49243787197238,28.62973426720793,16.788993225280443,28.491089740069583,14.4C28.350792861921335,11.982535002700022,25.259715184294578,10.923789114561682,23.961433070358794,8.879704042989765C22.736963903528455,6.951834038734432,23.02703567441902,4.0193516246352905,21.1097347943578,2.778398430859594C19.19942045174637,1.541967201295104,16.673848406559195,2.603549612643227,14.4,2.6911652334965765C12.216037763267007,2.7753173725484412,9.877362945706604,2.195406656901489,7.98230307796039,3.2842228634489885C6.086456214085641,4.3734912425921,5.319149467422186,6.632457317713655,4.235245459965795,8.531376230064774C3.156353321686792,10.421514721731313,1.2740336152960599,12.254169491465273,1.6374110944569111,14.399999999999999C2.0073837038693902,16.58477632249762,4.7361391563517525,17.435870906080932,6.04582589503425,19.223284668358968C7.17329889143554,20.76201961225235,7.203611807180369,23.06113786809392,8.775535697070877,24.1418579380307C10.364053416702529,25.233986502331426,12.47228092356822,24.961196731559216,14.4,24.966898389765994" fill="#7ed0ec" strokewidth="0"></path></g><g id="SVGRepo_iconCarrier"> <path d="M20.6471 15.0496C19.9956 17.827 17.827 19.9956 15.0496 20.6471C13.0437 21.1176 10.9563 21.1176 8.95043 20.6471C6.17301 19.9956 4.00437 17.827 3.35288 15.0496C2.88237 13.0437 2.88237 10.9563 3.35288 8.95044C4.00437 6.17301 6.173 4.00437 8.95043 3.35288C10.9563 2.88238 13.0437 2.88238 15.0496 3.35288C17.827 4.00437 19.9956 6.173 20.6471 8.95043C21.1176 10.9563 21.1176 13.0437 20.6471 15.0496Z" stroke="#0095FF" stroke-width="1.5"></path> <path d="M20.6471 15.0496C21.1176 13.0437 21.1176 10.9563 20.6471 8.95043C19.9956 6.173 17.827 4.00437 15.0496 3.35288C13.0437 2.88238 10.9563 2.88238 8.95043 3.35288C6.173 4.00437 4.00437 6.17301 3.35288 8.95044C2.88237 10.9563 2.88237 13.0437 3.35288 15.0496C4.00437 17.827 6.17301 19.9956 8.95043 20.6471" stroke="#363853" stroke-width="1.5" stroke-linecap="round"></path> <path d="M14.5 12H9.5M12 14.5L12 9.5" stroke="#0095FF" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    <p> Créer un nouveau type de régime</p>
                </button>
            </div>

            <div class="border-b border-gray-200 shadow-lg hover:shadow-2xl hover:shadow-cyan-500/60 shadow-cyan-500/50">
                <table class="divide-y divide-gray-300">
                    <thead class="bg-gray-200">
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
                                <th class="bg-gray-200" scope="row">{{ $regime->id }}</th>
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
