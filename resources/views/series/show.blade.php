<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl leading-tight text-white">
                {{ $series->title }} {{$series->author ? 'by ' . $series->author : ''}}
            </h2>

            <div>
                <form method="POST" action="{{route('series.destroy')}}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="series_id" value="{{ $series->id }}">
                    <x-danger-button>Delete the series</x-danger-button>
                </form>
            </div>
        </div>

    </x-slot>

    <div class="py-4 container mx-auto">
        @php

        $current_item = $last_updated ?? $series->episodes[0];
        $current_item_url = $current_item['url'] ?? '';
        $current_item_id = $current_item['id'] ?? '';
        @endphp
        <div class="grid grid-cols-4 gap-4"
            x-data="{ iframeUrl: 'https://www.youtube.com/embed/{{ $current_item_url }}', currentItem: '{{ $current_item_id }}' }">
            <ul role="list"
                class="rounded shadow bg-card-fill divide-y divide-white/10 h-screen overflow-y-auto no-scrollbar space-y-6">
                @foreach ($series->episodes as $item)
                <li class="panel relative transition-colors duration-300 hoverable bg-card-600/40 hover:bg-card-600 has-custom-bg episode-list-item group flex-center content-item-condensed group cursor-pointer rounded-md px-1 pr-4 py-0 text-white/80 {{$item->completed ? 'completed' : '' }}"
                    id="episode-{{$item->id}}">
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

                                    <h4 class="episode-list-title flex items-center md:text-sm"><span
                                            class="clamp one-line md:text-[13px] font-medium leading-normal inherits-color text-left"
                                            style="letter-spacing: -0.07px;"> {{$item->title}}</span></h4>
                                </button>

                            </div>
                        </div>

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
                <div class="flex justify-end">
                    <x-form-button :action="route('completed')"
                        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors  border rounded-md add-new-series-btn mt-6 text-white">
                        <input type="hidden" name="completed" x-bind:value="currentItem">
                        Mark as completed
                    </x-form-button>
                </div>

            </div>
        </div>


    </div>
    <script>
        const playing = document.getElementById('episode-{{ $current_item_id }}')
        if (playing) {
            playing.scrollTop -= 170;
            playing.scrollIntoView({behavior: 'smooth', block: 'center'});
        }

    </script>

</x-app-layout>