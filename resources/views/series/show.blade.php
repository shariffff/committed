<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $series->title }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto">

        <div class="grid grid-cols-3 gap-16" x-data="{ iframeUrl: '' }">
            <ul role="list" class="bg-gray-800 divide-gray-700 divide-y text-white">
                @foreach ($series->episodes as $item)
                <li class="flex justify-between gap-x-6 p-5">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <button class=" text-sm font-semibold leading-6" x-on:click="iframeUrl = '{{$item->url}}'">
                                {{$item->title}}
                            </button>
                        </div>
                    </div>

                </li>
                @endforeach

            </ul>
            <div class="col-span-2">
                <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25"
                    style="margin-right: 0px;">
                    <div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]"
                        style="background-position: 10px 10px;"></div>
                    <div class="relative rounded-xl overflow-auto p-8"><iframe
                            class="w-full aspect-video rounded-lg shadow-lg" x-bind:src="iframeUrl" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe></div>
                    <div
                        class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5">
                    </div>
                </div>
            </div>
        </div>


    </div>

</x-app-layout>