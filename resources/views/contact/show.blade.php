<x-admin-layout>
     
    <section class="bg-gray-200">        
    @livewire('button-back')
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
    </section>
</x-admin-layout> 