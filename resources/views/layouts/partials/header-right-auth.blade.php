<div class="relative ml-3 flex space-x-4">
    {{--
        @can('view-admin', App\Models\User::class)
        <x-nav-link :navigate='false' href="{{ route('filament.admin.auth.login') }}" :active="request()->routeIs('filament.admin.auth.login')">
        {{ __('menu.admin') }}
        </x-nav-link>
        @endcan
    --}}
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button
                    class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none"
                >
                    <img
                        class="h-8 w-8 rounded-full object-cover"
                        src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}"
                    />
                </button>
            @else
                <span class="inline-flex rounded-md">
                    <button
                        type="button"
                        class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50"
                    >
                        {{ Auth::user()->name }}

                        <svg
                            class="-mr-0.5 ml-2 h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                            />
                        </svg>
                    </button>
                </span>
            @endif
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link href="/dashboard">
                {{ __("Dashboard") }}
            </x-dropdown-link>

            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __("Manage Account") }}
            </div>

            <x-dropdown-link wire:navigate href="{{ route('profile.show') }}">
                {{ __("Profile") }}
            </x-dropdown-link>

            <div class="border-t border-gray-200"></div>
            <!-- Authentication -->
            <form method="POST" action="{{ route("logout") }}" x-data>
                @csrf

                <x-dropdown-link
                    href="{{ route('logout') }}"
                    @click.prevent="$root.submit();"
                >
                    {{ __("Log Out") }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>
