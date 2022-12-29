<x-guest-layout>
    <section class="h-full gradient-form bg-gray-200 ">
    
        <div class="container py-12 px-6 h-full mx-auto">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="xl:w-10/12">
                <div class="block bg-white shadow-lg rounded-lg">
                <div class="lg:flex lg:flex-wrap g-0">
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
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                            </label>
                        </div>
                        <div class="text-center pt-1 mb-12 pb-1">
                            <button class="button-login inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
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
                    <div class="bg-login lg:w-6/12 flex md:items-start lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none">
                    <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                        <div class="ml-52 md:ml-36 md:mb-32">
                            <x-jet-authentication-card-logo />
                        </div>
                        <h4 class="text-xl font-semibold mb-6">Lorem Ipsum</h4>
                        <p class="text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                        </p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</x-guest-layout>
