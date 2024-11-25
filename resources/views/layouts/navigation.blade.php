<nav class="border-b border-white/30">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center text-white font-bold">
                <a href="{{ route('dashboard') }}">
                    {{ config('app.name', 'Committed') }}
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="space-x-8 flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ Auth::user()->name }}
                </x-nav-link>
            </div>

        </div>
    </div>

</nav>