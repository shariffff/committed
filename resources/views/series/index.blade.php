<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto">

        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($series as $item)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://ik.imagekit.io/laracasts/series/thumbnails/png//php-for-beginners.png?tr=w-490"
                        alt="">
                    <div class="min-w-0 flex-auto">
                        <a href="/series/{{$item->id}}">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{$item->title}}</p>

                        </a>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Progress: {{$item->progress}}</p>
                </div>
            </li>
            @endforeach

        </ul>

    </div>

</x-app-layout>