<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div x-data="{ open: false }">
                <x-jet-button x-on:click="open = ! open">Ouvrir le formulaire</x-jet-button>
                <form x-cloak x-show="open" x-transition class="bg-white rounded-lg px-4 py-5 mt-2 shadow hover:shadow-xl">
                        <!-- Role -->
                        <div class="mb-3 text-center space-y-2">
                            <div>
                                <x-jet-label class="underline font-semibold" for="role_id">Role attribué</x-jet-label>
                                <select wire:model='state.role_id' name="role_id" id="role_id" 
                                        class="appearance-none px-10 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat
                                                border border-solid border-gray-300 ounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                    <option value="">Choisir un rôle</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role_id') <small class="text-red-600 italic">{{ $message }}</small> @enderror
                        </div>
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

                        <div class="text-center flex space-x-10 justify-center mb-5">
                            <div class="mb-3 text-center space-y-2">
                                <div>
                                    <x-jet-label class="underline font-semibold" for="email">Mail</x-jet-label>
                                    <x-jet-input wire:model="state.email" id="email" type="email" name="email"/>
                                </div>
                                @error('email') <small class="text-red-600 italic">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3 text-center space-y-2">
                                <div>
                                    <x-jet-label class="underline font-semibold" for="email">Mot de passe</x-jet-label>
                                    <x-jet-input wire:model="state.password" id="password" class="block mt-1 w-full" type="password" name="password"/>
                                </div>
                                @error('password') <small class="text-red-600 italic">{{ $message }}</small> @enderror
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
                <h3 class="text-green-600 text-lg text-center mb-5"> {{ $users->count() }} Utilisateur(s) répertorié(s)</h3>
                <table class="divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr class="px-6 py-2 text-xs text-gray-500 divide-x divide-gray-300">
                            <th class="px-4 py-4" scope="col">#</th>
                            <th class="px-6 py-4" scope="col">Nom</th>
                            <th class="px-6 py-4" scope="col">Prénom</th>
                            <th class="px-6 py-4" scope="col">Mail</th>
                            <th class="px-6 py-4" scope="col">Role attribué</th>
                            <th class="px-6 py-4" scope="col"> -- </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        @foreach ($users as $user)
                            <tr class="whitespace-nowrap text-xs text-center text-gray-500 divide-x">
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->last_name}}</td>
                                <td>{{ $user->role->name}}</td>
                                <td>{{ $user->email}}</td>
                                <td class="px-6 py-4">
                                    <button wire:click.prevent="edit({{ $user->id }})" type="button" class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Modifier</button>
                                    <button wire:click.prevent="delete({{ $user->id }})" type="button" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
