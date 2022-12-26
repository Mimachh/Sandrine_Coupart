<x-app-layout>

@forelse($recettes as $r)
{{$r->id}} {{$r->title}} 

    @foreach($r->regimes as $rr)
        @foreach($rr->users as $user)
        {{ $user->name}}
        @endforeach
     {{ $rr->id}}
    @endforeach
@empty
<h1>rien</h1>
@endforelse

<!-- {{ $patient_id->regimes->implode('id', ', ') }} -->

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-center text-green-200">Liste des Recettes</h1>
    </x-slot>

    @foreach($recettes as $recette)
    <div class="flex mx-4 pb-4">
        <div class="rounded-lg shadow-lg bg-white max-w-sm">
            <a href="">
                <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt=""/>
            </a>
            <div class="p-6">
            <h5 class="text-gray-900 text-2xl font-medium mb-2">{{ $recette->title }}</h5>
            <p class="text-gray-700 text-lg mb-4">
                {{ $recette->description }}
            </p>
            <div class="my-2">
                <p class="my-3 text-gray-900 text-base ">Cette recette convient au(x) regime(s) :
                    <ul>
                    @foreach($recette->regimes as $regime)
                        <li class="text-gray-700 text-base ">
                        - {{ $regime->type }}
                        </li>
                    @endforeach
                    </ul>
                </p>
            </div>
            <div class="px-2 py-2 border border-2 border-red-600">
                <h3 class="text-red-600 font-bold">Attention !</h3>
                <p class="underline text-gray-700 text-base">Cette recette ne convient pas aux personnes allergiques :</p>
                <ul>
                    @foreach($recette->allergenes as $allergene)
                    <li class="text-gray-700 font-bold">
                        - {{ $allergene->name }}
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="text-center py-2">
                <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Voir la recette</button>
            </div>

            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>