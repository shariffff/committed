<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Series') }}
        </h2>
    </x-slot> --}}

    <div class="py-12 container mx-auto">
        <form action="{{route('series.store')}}" method="POST">
            @csrf
            <input type="text" name="title" id="title">
            <input type="url" name="playlist_url" id="playlist_url">
            <button type="submit">Add</button>
            @error('title')
            <div class="text-red-500">{{$message}}</div>
            @enderror
            @error('playlist_url')
            <div class="text-red-500">{{$message}}</div>
            @enderror
        </form>

    </div>

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($series as $item)
                <div class="group relative">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 bg-gray-800">
                        <img src="https://ik.imagekit.io/laracasts/series/thumbnails/png//php-for-beginners.png?tr=w-490"
                            alt="Front of men&#039;s Basic Tee in black."
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="/series/{{$item->id}}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{$item->title}}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Black</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">$35</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>