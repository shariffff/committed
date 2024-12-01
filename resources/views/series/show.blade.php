<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl leading-tight text-white">
                {{ $series->title }} {!! $series->author ? " <span class='text-white/50'> by $series->author </span>" :
                '' !!}
            </h2>
            <div>
                <form method="POST" action="{{route('series.destroy')}}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="series_id" value="{{ $series->id }}">
                    <x-secondary-button>Delete the series</x-secondary-button>
                </form>
            </div>
        </div>

    </x-slot>

    <div class="py-4 container mx-auto">
        <div class="grid grid-cols-4 gap-4">
            <ul role="list" class="bg-card-fill h-screen no-scrollbar overflow-y-auto rounded shadow p-3 ">
                @foreach ($series->episodes as $item)
                <li style="background: #1e2430"
                    class="bg-card-fill cursor-pointer duration-300 flex-center group hoverable mb-6 pr-4 px-4 py-4 radius:medium relative rounded-md text-white/80 transition-colors {{$item->id === $episode->id ? 'currently-playing' : ''}} {{$item->completed ? 'completed' : '' }}"
                    id="episode-{{$item->id}}">
                    <a href="{{route('series.showEpisode', [$series->id, $item->id])}}" class="flex w-full">

                        <div class="flex-center relative mr-2 scale-[.67] pr-0 font-bold">
                            <div class="bg-card-fill circle text-2xl text-white tracking-tight w-14">
                                <span class="font-light">{{$loop->iteration}}</span>
                            </div>
                        </div>
                        <div class="episode-list-details flex flex-1">
                            <div>
                                <div class="items-center justify-between">
                                    <h4 class="episode-list-title flex items-center md:text-sm"><span
                                            class="leading-loose text-left" style=""> {{$item->title}}</span></h4>
                                </div>
                            </div>

                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="col-span-3 ">
                <div class="not-prose relative rounded-xl overflow-hidden bg-card-fill p-2" style="margin-right: 0px;">

                    <div class="relative overflow-auto"><iframe class="w-full aspect-video rounded-lg shadow-lg"
                            src="https://www.youtube.com/embed/{{$episode->url}}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe></div>

                    <div
                        class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5">
                    </div>
                </div>
                <div class="flex justify-end">
                    <x-form-button action="/episode-completed/{{$episode->id}}"
                        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors  border rounded-md add-new-series-btn mt-6 text-white">
                        Mark as {{$episode->completed ? 'incomplete' : 'completed'}}
                    </x-form-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>