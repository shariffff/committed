<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @foreach ($series as $item)
        <h6>{{ $item->title }}</h6>
        <p>{{ $item->user->id }}</p>
        @endforeach
    </div>

</x-app-layout>