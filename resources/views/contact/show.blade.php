<x-admin-layout>
     
    <section class="bg-gray-200 pb-12">        
        @livewire('button-back')
        <div class="text-center bg-white container mx-auto rounded-3xl py-4 my-12">
            <div class="space-y-4">
                <h2 class="text-xl font-semibold">Message de :
                    <span class="text-gray-600">{{ $contact->name }} {{ $contact->last_name }}</span>
                </h2>
                <h3 class="text-lg font-semibold">Sujet :
                    <span class="text-gray-600">{{ $contact->subject->name }}</span>
                </h3>
            </div>
            <div class="space-y-2 my-8">
                
                <div class="border py-4 mx-12 rounded-lg shadow md:mx-64 lg:mx-96">
                    <p class="underline">Adresse mail : </p>
                    <div class="flex items-center justify-center">
                        <input class="border-none text-center rounded-xl text-gray-800" id="copyMail" type="text" disabled value="{{ $contact->email }}">
                        <button onclick="copyMail()" class="">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="border py-4 mx-12 rounded-lg shadow md:mx-64 lg:mx-96">
                    <p class="underline">Téléphone :</p>
                    <div class="flex items-center justify-center">
                        <input class="border-none text-center rounded-xl text-gray-800" id="copyPhone" type="text" disabled value="{{ $contact->phone }}">
                        <button onclick="copyPhone()" class="">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="indigo" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <p class="text-md underline mb-4 font-semibold"> Contenu : </p>
            <p class="text-sm">{{ $contact->message }}</p>

            <textarea name="content" id="copyContent" cols="30" rows="10">{{ $contact->message }}</textarea>
        </div>     
    </section>
    <script>
        function copyMail() {
            // Get the text field
            var copyText = document.getElementById("copyMail");

            // Alert the copied text
            alert("Adresse mail copiée " + copyText.value);
        }
        function copyPhone() {
            // Get the text field
            var copyText = document.getElementById("copyPhone");

            // Alert the copied text
            alert("Téléphone copié " + copyText.value);
        }
    </script>
</x-admin-layout> 