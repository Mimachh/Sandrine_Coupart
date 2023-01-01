<div>
    @if($hideForm != true)
        <form wire:submit.prevent="rate">
            <div class="block max-w-3xl px-1 py-2 mx-auto">
                <h3 class="text-gray-800 py-4">Laisser un commentaire </h3>
                <!-- RATING STARS -->
                <div class="flex space-x-1 rating mb-2">
                    <label for="star1">
                        <input hidden wire:model="rating" type="radio" id="star1" name="rating" value="1" />
                        <svg class="cursor-pointer block hover:text-gray-200 w-10 h-10 @if($rating >= 1 ) text-yellow-300 @else text-white @endif" fill="currentColor" stroke='black' viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_iconCarrier">
                            <path d="m7.68 26.92a81.36 81.36 0 0 1 9.32-3.35 46.42 46.42 0 0 1 5.66-1.06s2.28-5.09 3.59-7.66 2.16-4.28 3.6-4.43 4.31 4.43 5.71 6.84 2.6 4.41 2.6 4.41 9.72.9 13.22 1.06 4.78.25 5.15 1.19-8 7-9.68 8.31a21.53 21.53 0 0 0 -2.69 2.5s1.78 6.4 2.94 11.06 1.65 6.41 1.12 7.31-2.16.41-3.56-.37-7.56-4.78-9.88-6.1-3.18-1.21-3.34-1.18-8.81 4.62-11.56 6.15-4.26 1.57-4.88 1.4-.31-1.78-.09-3 3.69-13.6 3.69-13.78a44.64 44.64 0 0 0 -7-5.57c-2.6-1.65-3.54-2.05-3.76-2.23s-.66-1.29-.16-1.5z" fill="currentColor"></path>
                            <path d="m10.87 27.45c.21-.35 6.44-2.38 9.22-3s3.28-.56 3.43-.69 2.82-5.59 4.19-8.12 1.88-3.16 2.1-3.16a81.12 81.12 0 0 1 5.19 7.72c1.27 2.25 1.52 2.8 1.71 2.8s9.35.81 12.5 1 4.63.41 4.5.63-5.47 4.12-8 6.31-3.71 2.98-3.65 3.35 1.53 6.38 1.43 6.31a25.89 25.89 0 0 0 -3.49-1.6c-.12.12-.65.84-.4 1.09s4.12 2 4.12 2.19.32 1.69.32 1.69-5.25-3-5.47-3-.88.56-.72.78 6.31 3.56 6.47 3.78a5.48 5.48 0 0 1 .56 1.53c-.09 0-7.72-4.5-8-4.44s-.75.94-.66 1 8.91 5.19 9.07 5.44.87 2 .68 2-7.59-4.34-10.4-5.9-3.47-1.79-4-1.75a121.69 121.69 0 0 0 -11.47 5.75c-2.16 1.31-3 1.56-3.07 1.4s2.44-10.06 3-12.5.79-2.87.16-3.65a27.46 27.46 0 0 0 -5.47-4.22c-2.6-1.62-3.95-2.59-3.85-2.74z" fill="currentColor"></path><path d="m27.06 21c-.33-.33 2.18-4.69 2.31-4.69s.81.16.87.41a32.48 32.48 0 0 1 -2 4.72 3.18 3.18 0 0 1 -1.18-.44z" fill="currentColor"></path></g>
                        </svg>
                    </label>
                    <label for="star2">
                        <input hidden wire:model="rating" type="radio" id="star2" name="rating" value="2" />
                        <svg class="cursor-pointer block w-10 h-10 @if($rating >= 2 ) text-yellow-300 @else text-white @endif" fill="currentColor" stroke='black' viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_iconCarrier">
                            <path d="m7.68 26.92a81.36 81.36 0 0 1 9.32-3.35 46.42 46.42 0 0 1 5.66-1.06s2.28-5.09 3.59-7.66 2.16-4.28 3.6-4.43 4.31 4.43 5.71 6.84 2.6 4.41 2.6 4.41 9.72.9 13.22 1.06 4.78.25 5.15 1.19-8 7-9.68 8.31a21.53 21.53 0 0 0 -2.69 2.5s1.78 6.4 2.94 11.06 1.65 6.41 1.12 7.31-2.16.41-3.56-.37-7.56-4.78-9.88-6.1-3.18-1.21-3.34-1.18-8.81 4.62-11.56 6.15-4.26 1.57-4.88 1.4-.31-1.78-.09-3 3.69-13.6 3.69-13.78a44.64 44.64 0 0 0 -7-5.57c-2.6-1.65-3.54-2.05-3.76-2.23s-.66-1.29-.16-1.5z" fill="currentColor"></path>
                            <path d="m10.87 27.45c.21-.35 6.44-2.38 9.22-3s3.28-.56 3.43-.69 2.82-5.59 4.19-8.12 1.88-3.16 2.1-3.16a81.12 81.12 0 0 1 5.19 7.72c1.27 2.25 1.52 2.8 1.71 2.8s9.35.81 12.5 1 4.63.41 4.5.63-5.47 4.12-8 6.31-3.71 2.98-3.65 3.35 1.53 6.38 1.43 6.31a25.89 25.89 0 0 0 -3.49-1.6c-.12.12-.65.84-.4 1.09s4.12 2 4.12 2.19.32 1.69.32 1.69-5.25-3-5.47-3-.88.56-.72.78 6.31 3.56 6.47 3.78a5.48 5.48 0 0 1 .56 1.53c-.09 0-7.72-4.5-8-4.44s-.75.94-.66 1 8.91 5.19 9.07 5.44.87 2 .68 2-7.59-4.34-10.4-5.9-3.47-1.79-4-1.75a121.69 121.69 0 0 0 -11.47 5.75c-2.16 1.31-3 1.56-3.07 1.4s2.44-10.06 3-12.5.79-2.87.16-3.65a27.46 27.46 0 0 0 -5.47-4.22c-2.6-1.62-3.95-2.59-3.85-2.74z" fill="currentColor"></path><path d="m27.06 21c-.33-.33 2.18-4.69 2.31-4.69s.81.16.87.41a32.48 32.48 0 0 1 -2 4.72 3.18 3.18 0 0 1 -1.18-.44z" fill="currentColor"></path></g>
                        </svg>
                    </label>
                    <label for="star3">
                        <input hidden wire:model="rating" type="radio" id="star3" name="rating" value="3" />
                        <svg class="cursor-pointer block w-10 h-10 @if($rating >= 3 ) text-yellow-300 @else text-white @endif" fill="currentColor" stroke='black' viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_iconCarrier">
                            <path d="m7.68 26.92a81.36 81.36 0 0 1 9.32-3.35 46.42 46.42 0 0 1 5.66-1.06s2.28-5.09 3.59-7.66 2.16-4.28 3.6-4.43 4.31 4.43 5.71 6.84 2.6 4.41 2.6 4.41 9.72.9 13.22 1.06 4.78.25 5.15 1.19-8 7-9.68 8.31a21.53 21.53 0 0 0 -2.69 2.5s1.78 6.4 2.94 11.06 1.65 6.41 1.12 7.31-2.16.41-3.56-.37-7.56-4.78-9.88-6.1-3.18-1.21-3.34-1.18-8.81 4.62-11.56 6.15-4.26 1.57-4.88 1.4-.31-1.78-.09-3 3.69-13.6 3.69-13.78a44.64 44.64 0 0 0 -7-5.57c-2.6-1.65-3.54-2.05-3.76-2.23s-.66-1.29-.16-1.5z" fill="currentColor"></path>
                            <path d="m10.87 27.45c.21-.35 6.44-2.38 9.22-3s3.28-.56 3.43-.69 2.82-5.59 4.19-8.12 1.88-3.16 2.1-3.16a81.12 81.12 0 0 1 5.19 7.72c1.27 2.25 1.52 2.8 1.71 2.8s9.35.81 12.5 1 4.63.41 4.5.63-5.47 4.12-8 6.31-3.71 2.98-3.65 3.35 1.53 6.38 1.43 6.31a25.89 25.89 0 0 0 -3.49-1.6c-.12.12-.65.84-.4 1.09s4.12 2 4.12 2.19.32 1.69.32 1.69-5.25-3-5.47-3-.88.56-.72.78 6.31 3.56 6.47 3.78a5.48 5.48 0 0 1 .56 1.53c-.09 0-7.72-4.5-8-4.44s-.75.94-.66 1 8.91 5.19 9.07 5.44.87 2 .68 2-7.59-4.34-10.4-5.9-3.47-1.79-4-1.75a121.69 121.69 0 0 0 -11.47 5.75c-2.16 1.31-3 1.56-3.07 1.4s2.44-10.06 3-12.5.79-2.87.16-3.65a27.46 27.46 0 0 0 -5.47-4.22c-2.6-1.62-3.95-2.59-3.85-2.74z" fill="currentColor"></path><path d="m27.06 21c-.33-.33 2.18-4.69 2.31-4.69s.81.16.87.41a32.48 32.48 0 0 1 -2 4.72 3.18 3.18 0 0 1 -1.18-.44z" fill="currentColor"></path></g>
                        </svg>
                    </label>
                    <label for="star4">
                        <input hidden wire:model="rating" type="radio" id="star4" name="rating" value="4" />
                        <svg class="cursor-pointer block w-10 h-10 @if($rating >= 4 ) text-yellow-300 @else text-white @endif" fill="currentColor" stroke='black' viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_iconCarrier">
                            <path d="m7.68 26.92a81.36 81.36 0 0 1 9.32-3.35 46.42 46.42 0 0 1 5.66-1.06s2.28-5.09 3.59-7.66 2.16-4.28 3.6-4.43 4.31 4.43 5.71 6.84 2.6 4.41 2.6 4.41 9.72.9 13.22 1.06 4.78.25 5.15 1.19-8 7-9.68 8.31a21.53 21.53 0 0 0 -2.69 2.5s1.78 6.4 2.94 11.06 1.65 6.41 1.12 7.31-2.16.41-3.56-.37-7.56-4.78-9.88-6.1-3.18-1.21-3.34-1.18-8.81 4.62-11.56 6.15-4.26 1.57-4.88 1.4-.31-1.78-.09-3 3.69-13.6 3.69-13.78a44.64 44.64 0 0 0 -7-5.57c-2.6-1.65-3.54-2.05-3.76-2.23s-.66-1.29-.16-1.5z" fill="currentColor"></path>
                            <path d="m10.87 27.45c.21-.35 6.44-2.38 9.22-3s3.28-.56 3.43-.69 2.82-5.59 4.19-8.12 1.88-3.16 2.1-3.16a81.12 81.12 0 0 1 5.19 7.72c1.27 2.25 1.52 2.8 1.71 2.8s9.35.81 12.5 1 4.63.41 4.5.63-5.47 4.12-8 6.31-3.71 2.98-3.65 3.35 1.53 6.38 1.43 6.31a25.89 25.89 0 0 0 -3.49-1.6c-.12.12-.65.84-.4 1.09s4.12 2 4.12 2.19.32 1.69.32 1.69-5.25-3-5.47-3-.88.56-.72.78 6.31 3.56 6.47 3.78a5.48 5.48 0 0 1 .56 1.53c-.09 0-7.72-4.5-8-4.44s-.75.94-.66 1 8.91 5.19 9.07 5.44.87 2 .68 2-7.59-4.34-10.4-5.9-3.47-1.79-4-1.75a121.69 121.69 0 0 0 -11.47 5.75c-2.16 1.31-3 1.56-3.07 1.4s2.44-10.06 3-12.5.79-2.87.16-3.65a27.46 27.46 0 0 0 -5.47-4.22c-2.6-1.62-3.95-2.59-3.85-2.74z" fill="currentColor"></path><path d="m27.06 21c-.33-.33 2.18-4.69 2.31-4.69s.81.16.87.41a32.48 32.48 0 0 1 -2 4.72 3.18 3.18 0 0 1 -1.18-.44z" fill="currentColor"></path></g>
                        </svg>
                    </label>
                    <label for="star5">
                        <input hidden wire:model="rating" type="radio" id="star5" name="rating" value="5" />
                        <svg class="cursor-pointer block w-10 h-10 @if($rating >= 5 ) text-yellow-300 @else text-white @endif" fill="currentColor" stroke='black' viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_iconCarrier">
                            <path d="m7.68 26.92a81.36 81.36 0 0 1 9.32-3.35 46.42 46.42 0 0 1 5.66-1.06s2.28-5.09 3.59-7.66 2.16-4.28 3.6-4.43 4.31 4.43 5.71 6.84 2.6 4.41 2.6 4.41 9.72.9 13.22 1.06 4.78.25 5.15 1.19-8 7-9.68 8.31a21.53 21.53 0 0 0 -2.69 2.5s1.78 6.4 2.94 11.06 1.65 6.41 1.12 7.31-2.16.41-3.56-.37-7.56-4.78-9.88-6.1-3.18-1.21-3.34-1.18-8.81 4.62-11.56 6.15-4.26 1.57-4.88 1.4-.31-1.78-.09-3 3.69-13.6 3.69-13.78a44.64 44.64 0 0 0 -7-5.57c-2.6-1.65-3.54-2.05-3.76-2.23s-.66-1.29-.16-1.5z" fill="currentColor"></path>
                            <path d="m10.87 27.45c.21-.35 6.44-2.38 9.22-3s3.28-.56 3.43-.69 2.82-5.59 4.19-8.12 1.88-3.16 2.1-3.16a81.12 81.12 0 0 1 5.19 7.72c1.27 2.25 1.52 2.8 1.71 2.8s9.35.81 12.5 1 4.63.41 4.5.63-5.47 4.12-8 6.31-3.71 2.98-3.65 3.35 1.53 6.38 1.43 6.31a25.89 25.89 0 0 0 -3.49-1.6c-.12.12-.65.84-.4 1.09s4.12 2 4.12 2.19.32 1.69.32 1.69-5.25-3-5.47-3-.88.56-.72.78 6.31 3.56 6.47 3.78a5.48 5.48 0 0 1 .56 1.53c-.09 0-7.72-4.5-8-4.44s-.75.94-.66 1 8.91 5.19 9.07 5.44.87 2 .68 2-7.59-4.34-10.4-5.9-3.47-1.79-4-1.75a121.69 121.69 0 0 0 -11.47 5.75c-2.16 1.31-3 1.56-3.07 1.4s2.44-10.06 3-12.5.79-2.87.16-3.65a27.46 27.46 0 0 0 -5.47-4.22c-2.6-1.62-3.95-2.59-3.85-2.74z" fill="currentColor"></path><path d="m27.06 21c-.33-.33 2.18-4.69 2.31-4.69s.81.16.87.41a32.48 32.48 0 0 1 -2 4.72 3.18 3.18 0 0 1 -1.18-.44z" fill="currentColor"></path></g>
                        </svg>
                    </label>
                </div>
                <!-- / RATING STARS -->

                <textarea wire:model='comment' id="comment" class="w-full rounded-lg shadow" rows="3"></textarea>
                <div class="text-end mt-3">
                    <x-jet-button type="submit" class="bg-green-600">Envoyer</x-jet-button>
                </div>
            </div>
        </form>
    @endif
    <section class="relative block pt-20 pb-24 overflow-hidden text-left bg-white">
        <div class="w-full px-20 mx-auto text-left md:px-10 max-w-7xl xl:px-16">
            <div class="box-border flex flex-col flex-wrap justify-center -mx-4 text-indigo-900">
                <div class="relative w-full mb-12 leading-6 text-left xl:flex-grow-0 xl:flex-shrink-0">
                    <h2 class="box-border mx-0 mt-0 font-sans text-4xl font-bold text-center text-indigo-900">
                        Ratings
                    </h2>
                </div>
            </div>
            <div class="box-border flex grid flex-wrap justify-center gap-10 -mx-4 text-center text-indigo-900 lg:gap-16 lg:justify-start lg:text-left">
                @forelse ($comments as $rating)
                    <div class="flex col-span-1 align-items">
                        <div class="relative flex-shrink-0 text-center">
                            <h3 class="mb-2">{{ $rating->user->name }}</h3>
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="mx-auto h-12 w-12 rounded-full object-cover" src="{{ $rating->user->profile_photo_url }}" alt="{{ $rating->user->name }}" />
                                </div> 
                            @endif
                        </div>
                        <div class="relative px-4 mb-16 leading-6 text-left">
                            <div class="box-border text-gray-600">
                              <small>Posté {{ $rating->created_date() }}</small>  
                            </div>
                            <div class="box-border text-lg font-medium text-gray-600">
                                {{ $rating->comment }}
                            </div>
                            <div class="box-border mt-5 text-lg font-semibold text-indigo-900 uppercase">
                                Note : <strong>{{ $rating->rating }}</strong> ⭐
                                @auth
                                    @if(auth()->user()->id === $rating->user_id || auth()->user()->role->name === 'Admin' )                                       
                                        - <a wire:click.prevent="delete({{ $rating->id }})" class="text-sm cursor-pointer">Delete</a>
                                    @endif
                                @endauth
                            </div>
                            <div class="box-border text-left text-gray-700" style="quotes: auto;">
                                <a href="{{ '@' . $rating->user->username }}">
                                    {{  $rating->user->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="flex col-span-1">
                    <div class="relative px-4 mb-16 leading-6 text-left">
                        <div class="box-border text-lg font-medium text-gray-600">
                            No ratings
                        </div>
                    </div>
                </div>
                @endforelse

            </div>
    </section>
</div>
