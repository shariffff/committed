<x-app-layout>
    <div>
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            @error('playlist_url')
            <span class="bg-card-fill p-2 rounded text-white/50 border-b border-red-300">{{ $message }}</span>
            @enderror
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <div class="gradient-border">
                    <div style="background: #0c0c1d"
                        class="group relative  rounded shadow border border-white/5  flex items-center justify-center series  h-full w-full">
                        <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                            class="relative z-50 w-auto h-auto">
                            <button @click="modalOpen=true" class="text-white h-full w-full">Add
                                New</button>
                            <template x-teleport="body">
                                <div x-show="modalOpen"
                                    class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                    x-cloak>
                                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                        class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                                    <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                        x-transition:enter="ease-out duration-300"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="ease-in duration-200"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg text-black">
                                        <div class="flex items-center justify-between pb-2">
                                            <h3 class="text-lg font-semibold">Add a Youtube Playlist</h3>
                                            <button @click="modalOpen=false"
                                                class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="relative w-auto">
                                            <section>
                                                <form method="post" action="{{ route('series.store') }}"
                                                    class="mt-6 space-y-6">
                                                    @csrf
                                                    <div>
                                                        <x-input-label for="playlist_url" :value="__('Playlist Url')" />
                                                        <x-text-input id="playlist_url" name="playlist_url" type="url"
                                                            class="mt-1 block w-full text-black leading-10 px-2"
                                                            :value="old('playlist_url')" required
                                                            autocomplete="username" />
                                                        <x-input-error class="mt-2"
                                                            :messages="$errors->get('playlist_url')" />
                                                    </div>

                                                    <div class="flex items-center gap-4">
                                                        <x-primary-button>{{ __('Add') }}</x-primary-button>
                                                    </div>
                                                </form>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                    </div>
                </div>

                @foreach ($series as $item)
                <div class="w-full max-w-[360px] bg-black shadow-lg rounded-lg overflow-hidden relative">
                    <a class="item-link absolute h-full item-link w-full z-10" href="/series/{{$item->id}}"></a>

                    <div class="relative">
                        <img src="{{$item->thumbnail ?? 'https://g-szqljk52-sk.vusercontent.net/placeholder.svg'}}"
                            alt="Video thumbnail" class="w-full h-[200px] object-cover" />

                    </div>
                    <div class="p-4">
                        <h3 class="text-base font-semibold line-clamp-2 mb-1 text-gray-400">
                            <a href="/series/{{$item->id}}">{{$item->title}}</a>
                        </h3>
                        <p class="text-sm text-gray-500">{{$item->author ?? ''}}</p>
                        <div class="text-sm text-gray-500 mt-1">
                            <span>{{count(is_countable($item->episodes) ? $item->episodes : [])}} videos</span>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>