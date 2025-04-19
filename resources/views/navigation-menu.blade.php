<nav x-data="{ open: false }" class="tw-bg-white tw-border-b tw-border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="tw-max-w-7xl tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8">
        <div class="tw-flex tw-justify-between tw-h-16">
            <div class="tw-flex">
                <!-- Logo -->
                <div class="tw-shrink-0 tw-flex tw-items-center">
                    <a href="{{ route('dashboard') }}">
                        {{-- Assuming x-application-mark component applies its own classes or you modify it separately
                        --}}
                        {{-- If x-application-mark has inline classes like class="block h-9 w-auto", prefix them there
                        --}}
                        <x-application-mark class="tw-block tw-h-9 tw-w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                {{-- Added prefixes to the wrapper div --}}
                <div class="hidden sm:tw-space-x-8 sm:tw--my-px sm:tw-ms-10 sm:tw-flex">
                    {{-- x-nav-link component needs its internal classes prefixed separately --}}
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    {{-- Add prefixes to any other x-nav-link instances here --}}
                </div>
            </div>

            <div class="hidden sm:tw-flex sm:tw-items-center sm:tw-ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                {{-- Added prefixes to the wrapper div --}}
                <div class="tw-ms-3 tw-relative">
                    {{-- x-dropdown component needs its internal classes prefixed separately --}}
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            {{-- Added prefixes to the span --}}
                            <span class="tw-inline-flex tw-rounded-md">
                                {{-- Added prefixes to the button --}}
                                <button type="button"
                                    class="tw-inline-flex tw-items-center tw-px-3 tw-py-2 tw-border tw-border-transparent tw-text-sm tw-leading-4 tw-font-medium tw-rounded-md tw-text-gray-500 tw-bg-white hover:tw-text-gray-700 focus:tw-outline-none focus:tw-bg-gray-50 active:tw-bg-gray-50 tw-transition tw-ease-in-out tw-duration-150">
                                    {{ Auth::user()->currentTeam->name }}

                                    {{-- Added prefixes to the SVG --}}
                                    <svg class="tw-ms-2 tw--me-0.5 tw-size-4" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            {{-- Added prefixes to the content div --}}
                            <div class="tw-w-60">
                                <!-- Team Management -->
                                {{-- Added prefixes to the div --}}
                                <div class="tw-block tw-px-4 tw-py-2 tw-text-xs tw-text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                {{-- x-dropdown-link component needs its internal classes prefixed separately --}}
                                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                {{-- x-dropdown-link component needs its internal classes prefixed separately --}}
                                <x-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-dropdown-link>
                                @endcan

                                <!-- Team Switcher -->
                                @if (Auth::user()->allTeams()->count() > 1)
                                {{-- Added prefixes to the div --}}
                                <div class="tw-border-t tw-border-gray-200"></div>

                                {{-- Added prefixes to the div --}}
                                <div class="tw-block tw-px-4 tw-py-2 tw-text-xs tw-text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                {{-- x-switchable-team component needs its internal classes prefixed separately --}}
                                <x-switchable-team :team="$team" />
                                @endforeach
                                @endif
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif

                <!-- Settings Dropdown -->
                {{-- Added prefixes to the wrapper div --}}
                <div class="tw-ms-3 tw-relative">
                    {{-- x-dropdown component needs its internal classes prefixed separately --}}
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            {{-- Added prefixes to the button --}}
                            <button
                                class="tw-flex tw-text-sm tw-border-2 tw-border-transparent tw-rounded-full focus:tw-outline-none focus:tw-border-gray-300 tw-transition">
                                {{-- Added prefixes to the img --}}
                                <img class="tw-size-8 tw-rounded-full tw-object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            {{-- Added prefixes to the span --}}
                            <span class="tw-inline-flex tw-rounded-md">
                                {{-- Added prefixes to the button --}}
                                <button type="button"
                                    class="tw-inline-flex tw-items-center tw-px-3 tw-py-2 tw-border tw-border-transparent tw-text-sm tw-leading-4 tw-font-medium tw-rounded-md tw-text-gray-500 tw-bg-white hover:tw-text-gray-700 focus:tw-outline-none focus:tw-bg-gray-50 active:tw-bg-gray-50 tw-transition tw-ease-in-out tw-duration-150">
                                    {{ Auth::user()->name }}

                                    {{-- Added prefixes to the SVG --}}
                                    <svg class="tw-ms-2 tw--me-0.5 tw-size-4" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            {{-- Added prefixes to the div --}}
                            <div class="tw-block tw-px-4 tw-py-2 tw-text-xs tw-text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            {{-- x-dropdown-link component needs its internal classes prefixed separately --}}
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            {{-- x-dropdown-link component needs its internal classes prefixed separately --}}
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                            @endif

                            {{-- Added prefixes to the div --}}
                            <div class="tw-border-t tw-border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                {{-- x-dropdown-link component needs its internal classes prefixed separately --}}
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            {{-- Added prefixes to the wrapper div --}}
            <div class="tw--me-2 tw-flex tw-items-center sm:tw-hidden">
                {{-- Added prefixes to the button --}}
                <button @click="open = ! open"
                    class="tw-inline-flex tw-items-center tw-justify-center tw-p-2 tw-rounded-md tw-text-gray-400 hover:tw-text-gray-500 hover:tw-bg-gray-100 focus:tw-outline-none focus:tw-bg-gray-100 focus:tw-text-gray-500 tw-transition tw-duration-150 tw-ease-in-out">
                    <svg class="tw-size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        {{-- Added prefixes to path classes AND :class keys --}}
                        <path :class="{'tw-hidden': open, 'tw-inline-flex': ! open }" class="tw-inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'tw-hidden': ! open, 'tw-inline-flex': open }" class="tw-hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- Added prefixes to classes in :class keys AND the static classes --}}
    <div :class="{'tw-block': open, 'tw-hidden': ! open}" class="hidden sm:tw-hidden">
        {{-- Added prefixes to the div --}}
        <div class="tw-pt-2 tw-pb-3 tw-space-y-1">
            {{-- x-responsive-nav-link component needs its internal classes prefixed separately --}}
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            {{-- Add prefixes to any other x-responsive-nav-link instances here --}}
        </div>

        <!-- Responsive Settings Options -->
        {{-- Added prefixes to the div --}}
        <div class="tw-pt-4 tw-pb-1 tw-border-t tw-border-gray-200">
            {{-- Added prefixes to the div --}}
            <div class="tw-flex tw-items-center tw-px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                {{-- Added prefixes to the div --}}
                <div class="tw-shrink-0 tw-me-3">
                    {{-- Added prefixes to the img --}}
                    <img class="tw-size-10 tw-rounded-full tw-object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                <div>
                    {{-- Added prefixes to the divs --}}
                    <div class="tw-font-medium tw-text-base tw-text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="tw-font-medium tw-text-sm tw-text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            {{-- Added prefixes to the div --}}
            <div class="tw-mt-3 tw-space-y-1">
                <!-- Account Management -->
                {{-- x-responsive-nav-link component needs its internal classes prefixed separately --}}
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                {{-- x-responsive-nav-link component needs its internal classes prefixed separately --}}
                <x-responsive-nav-link href="{{ route('api-tokens.index') }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    {{-- x-responsive-nav-link component needs its internal classes prefixed separately --}}
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                {{-- Added prefixes to the div --}}
                <div class="tw-border-t tw-border-gray-200"></div>

                {{-- Added prefixes to the div --}}
                <div class="tw-block tw-px-4 tw-py-2 tw-text-xs tw-text-gray-400">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                {{-- x-responsive-nav-link component needs its internal classes prefixed separately --}}
                <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                    :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-responsive-nav-link>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                {{-- x-responsive-nav-link component needs its internal classes prefixed separately --}}
                <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-responsive-nav-link>
                @endcan

                <!-- Team Switcher -->
                @if (Auth::user()->allTeams()->count() > 1)
                {{-- Added prefixes to the div --}}
                <div class="tw-border-t tw-border-gray-200"></div>

                {{-- Added prefixes to the div --}}
                <div class="tw-block tw-px-4 tw-py-2 tw-text-xs tw-text-gray-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                {{-- x-switchable-team component needs its internal classes prefixed separately (including the component
                prop one) --}}
                <x-switchable-team :team="$team" component="responsive-nav-link" />
                @endforeach
                @endif
                @endif
            </div>
        </div>
    </div>
</nav>