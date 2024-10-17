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
            <ul role="list" class="bg-card-fill h-screen no-scrollbar overflow-y-auto rounded shadow px-3 ">
                @foreach ($series->episodes as $item)
                <li style="background: #1e2430"
                    class="bg-card-fill cursor-pointer duration-300 flex-center group hoverable mb-3 pr-4 px-1 py-0 radius:medium relative rounded-md text-white/80 transition-colors {{$item->completed ? 'completed' : '' }}"
                    id="episode-{{$item->id}}"
                    x-on:click="iframeUrl = 'https://www.youtube.com/embed/{{$item->url}}', currentItem = {{$item->id}}">
                    <div class="flex-center relative mr-2 scale-[.67] pr-0 font-bold">
                        <div class="circle text-2xl text-white tracking-tight w-14">
                            <span class="font-light">{{$loop->iteration}}</span>
                        </div>
                    </div>
                    <div class="episode-list-details flex flex-1">
                        <div>
                            <div class="items-center justify-between">
                                <button>

                                    <h4 class="episode-list-title flex items-center md:text-sm"><span
                                            class="clamp md:text-[13px] font-medium leading-normal inherits-color text-left"
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
                        Mark/Unmark as completed
                    </x-form-button>
                </div>

            </div>
        </div>


    </div>
    <style>
        #episode-@php echo $current_item_id @endphp +li {
            border: 2px solid pink;
        }
    </style>
    <script>
        const playing = document.getElementById('episode-{{ $current_item_id }}')
        if (playing) {
            playing.scrollTop -= 170;
            playing.scrollIntoView({behavior: 'smooth', block: 'center'});
        }

    </script>

</x-app-layout>