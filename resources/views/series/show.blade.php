<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight text-white">
            {{ $series->title }}
        </h2>
    </x-slot>

    <div class="py-4 container mx-auto">

        <div class="grid grid-cols-4 gap-4"
            x-data="{ iframeUrl: 'https://www.youtube.com/embed/{{$series->episodes[0]['url']}}', currentItem: {{$series->episodes[0]['id']}} }">
            <ul role="list"
                class="rounded shadow bg-card-fill divide-y divide-white/10 h-screen overflow-y-auto no-scrollbar space-y-6">
                @foreach ($series->episodes as $item)
                <li class="panel relative transition-colors duration-300 hoverable bg-card-600/40 hover:bg-card-600 has-custom-bg episode-list-item group flex-center content-item-condensed group cursor-pointer rounded-md px-1 pr-4 py-0 is-complete is-tooling text-white/80"
                    id="episode-2782" data-js="episode-number-2">
                    <div class="flex-center relative mr-2 scale-[.67] pr-0 font-bold">
                        <div
                            class="circle flex-center h-14 w-14 text-2xl font-medium tracking-tight text-white bg-card-600 transition-colors duration-300 group-hover:bg-card-300">
                            <span class="font-light">{{$loop->iteration}}</span>
                        </div>
                    </div>
                    <div class="episode-list-details flex flex-1">
                        <div>
                            <div class="items-center justify-between">
                                <button
                                    x-on:click="iframeUrl = 'https://www.youtube.com/embed/{{$item->url}}', currentItem = {{$item->id}}">
                                    {{-- <img class="h-16 border rounded"
                                        src="https://i.ytimg.com/vi/{{$item->url}}/mqdefault.jpg" alt=""> --}}
                                    <h4 class="episode-list-title flex items-center md:text-sm"><span
                                            class="clamp one-line md:text-[13px] font-medium leading-normal inherits-color text-left {{$item->completed ? 'completed' : '' }}"
                                            style="letter-spacing: -0.07px;"> {{$item->title}}</span></h4>
                                </button>

                            </div>
                        </div>
                        {{-- <div
                            class="mt-auto flex w-full items-center gap-x-3 text-[11px] lg:mt-px group-hover:text-grey-600/75 text-grey-600/75">
                            <svg width="9" viewBox="0 0 10 10" class="mr-1">
                                <g fill="none" fill-rule="evenodd">
                                    <g>
                                        <g>
                                            <g>
                                                <g>
                                                    <path class="fill-current"
                                                        d="M5 2C2.25 2 0 4.25 0 7s2.25 5 5 5 5-2.25 5-5-2.25-5-5-5zm2.282 6.923L4.615 7.318v-3.01h.77v2.608l2.307 1.355-.41.652z"
                                                        transform="translate(-978.000000, -378.000000) translate(330.000000, 364.000000) translate(444.000000, 8.000000) translate(204.000000, 4.000000)">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg> 7m 53s</span>
                        </div> --}}
                    </div>
                </li>

                @endforeach

            </ul>
            <div class="col-span-3 ">
                <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25 "
                    style="margin-right: 0px;">

                    <div class="relative overflow-auto"><iframe class="w-full aspect-video rounded-lg shadow-lg"
                            x-bind:src="iframeUrl" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe></div>

                    <div
                        class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5">
                    </div>

                </div>
                <x-form-button :action="route('completed')"
                    class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors  border rounded-md add-new-series-btn mt-6 text-white">
                    <input type="hidden" name="completed" x-bind:value="currentItem">
                    Mark as completed
                </x-form-button>
            </div>
        </div>


    </div>

</x-app-layout>