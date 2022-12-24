<div>

        <!-- Sidebar -->
        <div class="rounded-r-3xl fixed flex flex-col top-0 left-0 w-14 hover:w-52 md:w-52 bg-blue-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
            <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5 mb-4 hidden md:block">
                        <div class="flex flex-row items-center justify-center h-12 bg-blue-100 rounded-full">
                            <button type="button" wire:click="goToPageWelcome"><div class="text-center text-sm font-semibold tracking-wide text-red-400 uppercase">Tableau de bord de <br> {{ auth()->user()->name }}</div></button>
                        </div>
                    </li>

                    <!-- Partie Utilisateurs-->
                    <li>
                        <div x-data="{ open: false }">
                            <button x-on:click="open = ! open" type="button" class=" w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                <p class="inline-flex justify-center items-center ml-2">
                                    Utilisateurs
                                </p>
                            </button>
                            <div x-show="open" x-transition class="pl-5">
                                <ul>
                                    <li>
                                        <button wire:click="goToPageUsers" type="button" class=" w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                            Gérer les utilisateurs
                                        </button>
                                    </li>
                                    <li>
                                        <button wire:click="goToPagePatients" type="button" class=" w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                                            Gérer les patients
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- /Partie Utilisateurs-->

                    <!-- Partie Recettes-->
                    <li>
                        <button wire:click="goToPageRecettes" type="button" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <p class="inline-flex justify-center items-center ml-2">Recettes</p>
                        </button>
                    </li>
                    <!-- /Partie Recettes-->

                    <!-- Partie Allergenes-->
                    <li>
                        <button wire:click="goToPageAllergenes" type="button" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <p class="inline-flex justify-center items-center ml-2">Allergènes</p>
                        </button>
                    </li>
                    <!-- /Partie Allergenes-->
                    
                    <!-- Partie Regimes-->
                    <li>
                        <button wire:click="goToPageRegimes" type="button" class="w-full relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <p class="inline-flex justify-center items-center ml-2">Regimes</p>
                        </button>
                    </li>
                    <!-- /Partie Regimes-->

                    <li>
                        <a href="{{ route('/') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Aller sur le site</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('profile.show') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                        </a>
                    </li>
                </ul>
                </div>
        </div>
        <!-- ./Sidebar -->
    
    @if($currentPage === 1)
        <div class="bg-red-600">Coucou</div>
    @endif

    @if($currentPage === 2)
        <div>
            @livewire('admin.users')
        </div>
    @endif

    @if($currentPage === 3)
        <div>
            @livewire('admin.patients')
        </div>
    @endif

    @if($currentPage === 4)
        <div>
            @livewire('admin.recettes')
        </div>
    @endif

    @if($currentPage === 5)
        <div>
            @livewire('admin.allergenes')
        </div>
    @endif

    @if($currentPage === 6)
        <div>
            @livewire('admin.regimes')
        </div>
    @endif

</div> 



    

 

