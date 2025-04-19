@props(['team', 'component' => 'dropdown-link'])

<form method="POST" action="{{ route('current-team.update') }}" x-data>
    @method('PUT')
    @csrf

    <!-- Hidden Team ID -->
    <input type="hidden" name="team_id" value="{{ $team->id }}">

    {{-- The dynamic component itself (dropdown-link or responsive-nav-link) needs its internal classes prefixed separately --}}
    <x-dynamic-component :component="$component" href="#" x-on:click.prevent="$root.submit();">
        {{-- Added prefixes --}}
        <div class="tw-flex tw-items-center">
            @if (Auth::user()->isCurrentTeam($team))
                {{-- Added prefixes to SVG --}}
                <svg class="tw-me-2 tw-size-5 tw-text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @endif

            {{-- Added prefix --}}
            <div class="tw-truncate">{{ $team->name }}</div>
        </div>
    </x-dynamic-component>
</form>