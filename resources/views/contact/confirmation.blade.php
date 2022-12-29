<x-app-layout>

    <div class="mt-32 swal-icon swal-icon--success">
    <span class="bg-green-400 swal-icon--success__line swal-icon--success__line--long"></span>
    <span class="bg-green-400 swal-icon--success__line swal-icon--success__line--tip"></span>
    <div class="swal-icon--success__ring"></div>
    <div class="swal-icon--success__hide-corners"></div>
    </div>

    <div class="text-center space-y-4">
    <h1 class="text-green-400 font-medium text-xl">Votre message a bien été envoyé</h1>
    <p>Nous reviendrons vers vous au plus vite. <br>
        En attendons nous vous invitons à consulter nos <a href="{{ route('recettes.index') }}" class="text-blue-600">délicieuses recettes</a>  !
    </p>
    </div>
</x-app-layout>