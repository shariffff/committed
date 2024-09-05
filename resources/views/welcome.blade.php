<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-50 text-black/50">
        <div class="">
            <div class="">
                <main class="">
                    <section class="w-full px-6 pb-12 antialiased bg-white">
                        <div class="mx-auto max-w-7xl">

                            <nav class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
                                <div
                                    class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0">
                                    <div class="flex items-center justify-start w-1/4 h-full pr-4">
                                        <a href="/"
                                            class="flex items-center py-4 space-x-2 font-extrabold text-gray-900 md:py-0">

                                            <span>Committed</span>
                                        </a>
                                    </div>
                                    <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                                        :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
                                        <div
                                            class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                                            <a href="#_"
                                                class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">
                                                <svg class="w-auto h-5" viewBox="0 0 355 99"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <defs>
                                                        <path
                                                            d="M119.1 87V66.4h19.8c34.3 0 34.2-49.5 0-49.5-11 0-22 .1-33 .1v70h13.2zm19.8-32.7h-19.8V29.5h19.8c16.8 0 16.9 24.8 0 24.8zm32.6-30.5c0 9.5 14.4 9.5 14.4 0s-14.4-9.5-14.4 0zM184.8 87V37.5h-12.2V87h12.2zm22.8 0V61.8c0-7.5 5.1-13.8 12.6-13.8 7.8 0 11.9 5.7 11.9 13.2V87h12.2V61.1c0-15.5-9.3-24.2-20.9-24.2-6.2 0-11.2 2.5-16.2 7.4l-.8-6.7h-10.9V87h12.1zm72.1 1.3c7.5 0 16-2.6 21.2-8l-7.8-7.7c-2.8 2.9-8.7 4.6-13.2 4.6-8.6 0-13.9-4.4-14.7-10.5h38.5c1.9-20.3-8.4-30.5-24.9-30.5-16 0-26.2 10.8-26.2 25.8 0 15.8 10.1 26.3 27.1 26.3zM292 56.6h-26.6c1.8-6.4 7.2-9.6 13.8-9.6 7 0 12 3.2 12.8 9.6zm41.2 32.1c14.1 0 21.2-7.5 21.2-16.2 0-13.1-11.8-15.2-21.1-15.8-6.3-.4-9.2-2.2-9.2-5.4 0-3.1 3.2-4.9 9-4.9 4.7 0 8.7 1.1 12.2 4.4l6.8-8c-5.7-5-11.5-6.5-19.2-6.5-9 0-20.8 4-20.8 15.4 0 11.2 11.1 14.6 20.4 15.3 7 .4 9.8 1.8 9.8 5.2 0 3.6-4.3 6-8.9 5.9-5.5-.1-13.5-3-17-6.9l-6 8.7c7.2 7.5 15 8.8 22.8 8.8z"
                                                            id="a"></path>
                                                    </defs>
                                                    <g fill="none" fill-rule="evenodd">
                                                        <g fill="currentColor">
                                                            <path d="M19.742 49h28.516L68 83H0l19.742-34z"></path>
                                                            <path d="M26 69h14v30H26V69zM4 50L33.127 0 63 50H4z"></path>
                                                        </g>
                                                        <g fill-rule="nonzero">
                                                            <use fill="currentColor" xlink:href="#a"></use>
                                                            <use fill="currentColor" xlink:href="#a"></use>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                            <div
                                                class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">





                                            </div>
                                            <div
                                                class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0 gap-4">

                                                @if (Route::has('login'))

                                                @auth
                                                <a href="{{ url('/dashboard') }}"
                                                    class="inline-flex items-center w-full px-5 px-6 py-3 text-sm font-medium leading-4 text-white bg-gray-900 md:w-auto md:rounded-full hover:bg-gray-800 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-gray-800">
                                                    Dashboard
                                                </a>
                                                @else
                                                <a href="{{ route('login') }}"
                                                    class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                                                    Log in
                                                </a>

                                                @if (Route::has('register'))
                                                <a href="{{ route('register') }}"
                                                    class="inline-flex items-center w-full px-5 px-6 py-3 text-sm font-medium leading-4 text-white bg-gray-900 md:w-auto md:rounded-full hover:bg-gray-800 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-gray-800">
                                                    Register
                                                </a>
                                                @endif
                                                @endauth

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div @click="showMenu = !showMenu"
                                        class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                                        <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                                        </svg>
                                        <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            style="display: none;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                </div>
                            </nav>

                            <!-- Main Hero Content -->
                            <div
                                class="container max-w-sm py-32 mx-auto mt-px text-left sm:max-w-md md:max-w-lg sm:px-4 md:max-w-none md:text-center">
                                <h1
                                    class="text-3xl font-bold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:text-4xl md:text-7xl lg:text-8xl">
                                    Be committed to <br class="hidden sm:block"> your learning</h1>
                                <div class="mx-auto mt-5 text-gray-400 md:mt-8 md:max-w-lg md:text-center md:text-xl">
                                    Simplifying the way you watch youtube playlist
                                    more!</div>
                                <div
                                    class="flex flex-col items-center justify-center mt-8 space-y-4 text-center sm:flex-row sm:space-y-0 sm:space-x-4">
                                    <span class="relative inline-flex w-full md:w-auto">
                                        <a href="#_"
                                            class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-white bg-gray-900 border border-transparent rounded-full xl:px-10 md:w-auto hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                                            Watch video
                                        </a>
                                    </span>
                                    <span class="relative inline-flex w-full md:w-auto">
                                        <a href="#_"
                                            class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-medium leading-6 text-gray-900 bg-gray-100 border border-transparent rounded-full xl:px-10 md:w-auto hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">Learn
                                            More</a>
                                    </span>
                                </div>
                            </div>
                            <!-- End Main Hero Content -->

                        </div>
                    </section>
                </main>


            </div>
        </div>
    </div>


</body>

</html>