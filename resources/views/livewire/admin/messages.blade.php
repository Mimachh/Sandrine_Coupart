<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <h3 class="text-green-600 text-lg text-center mb-5"> {{ $messages->count() }} Message(s) reçu(s)</h3>  
            <div class="border-b border-gray-200 shadow-lg hover:shadow-2xl hover:shadow-cyan-500/60 shadow-cyan-500/50">
                <table class="divide-y divide-gray-300">
                    <thead class="bg-gray-200">
                        <tr class="px-6 py-2 text-xs text-gray-500 divide-x divide-gray-300">
                            <th class="px-4 py-4" scope="col">#</th>
                            <th class="px-6 py-4"scope="col">Nom - Prénom</th>
                            <th class="px-6 py-4" scope="col">Email</th>
                            <th class="px-6 py-4" scope="col">Téléphone</th>
                            <th class="px-6 py-4" scope="col">Sujet</th>
                            <th class="px-6 py-4" scope="col">Voir</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                        @foreach ($messages as $message)
                            <tr class="whitespace-nowrap text-xs text-center text-gray-500 divide-x">
                                <th class="bg-gray-200" scope="row">{{ $message->id }}</th>
                                <td>{{ $message->name}} - {{ $message->last_name}}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ $message->subject->name }}</td>
                                <td>
                                    <a href="{{ route('contact.show', $message )}}">Voir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-white border-t px-4 py-2">
                {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
