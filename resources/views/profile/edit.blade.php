<x-app-layout>
    <x-slot name="header">
        <h2 class="flex font-semibold items-center justify-between leading-tight text-gray-200 text-xl">
            {{ __('Profile') }}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-danger-button :href="route('logout')"
                    onclick="event.preventDefault();this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-danger-button>
            </form>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>