<x-admin-layout>   
<section class="h-full gradient-form bg-gray-200 ">
    <div class="container py-12 px-6 h-full mx-auto">
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="xl:w-10/12">
                <div class="block bg-white shadow-lg rounded-lg">
                    <div class="lg:flex lg:flex-wrap g-0">
                        <div class="bg-login lg:w-6/12 flex md:items-start lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none">
                            <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                                <div class="flex text-center space-x-4">
                                    <h2 class="text-xl font-semibold underline">Message de :</h2>
                                    <p class="text-lg font-semibold mb-6">{{ $contact->name }} {{ $contact->last_name }}</p>
                                </div>
                                <div class="space-y-2">
                                    <p>Adresse mail : {{ $contact->email }}</p>
                                    <p>Téléphone : {{ $contact->phone }}</p>
                                </div>
                                <h4 class="text-md font-semibold mt-4 mb-6">Sujet : {{ $contact->subject->name }}</h4>
                                <p class="text-md underline mb-4 font-semibold"> Message : </p>
                                <p class="text-sm">{{ $contact->message }}</p>
                            </div>
                        </div>
                        <div class="lg:w-6/12 px-4 md:px-0">
                            <div class="md:p-12 md:mx-6">
                                <div class="items-center">
                                    <h4 class="text-xl font-semibold mt-1 mb-2 pb-1">Sandrine COUPART</h4>
                                    <p class="font-semibold text-blue-600 mb-12"> Diet'éthique</p>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <p class="mb-4">Merci de vous connecter à votre compte</p>
                                    <div>
                                        <x-jet-label for="email" value="{{ __('Votre mail') }}" />
                                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                        @error('email') <small class="text-red-600 italic"> {{ $errors->first('email') }}</small>@enderror
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                        @error('password') <small class="text-red-600 italic"> {{ $errors->first('password') }}</small>@enderror
                                    </div>

                                    <div class="block mt-4">
                                        <label for="remember_me" class="flex items-center">
                                            <x-jet-checkbox id="remember_me" name="remember" />
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                                        </label>
                                    </div>
                                    <div class="text-center pt-1 mb-12 pb-1">
                                        <button class="button-perso inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                                        type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                        Se connecter
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                {{ __('Mot de passe oublié ?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="items-center justify-between pb-6">
                                        <p class="text-green-600">Vous n'avez pas de compte ?</p>
                                        <p class="mr-2 leading-tight">Contactez le cabinet <a href="{{ route('contact.create') }}" class="text-blue-700">ici</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</x-admin-layout> 