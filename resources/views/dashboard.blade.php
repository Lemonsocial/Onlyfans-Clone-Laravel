<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="{{ Auth::user()->personal_settings['Dark Mode'] ? 'bg-black' : 'bg-white' }} overflow-hidden shadow-xl sm:rounded-lg">
                <div>Livewire Testing will go here </div>
                {{-- {{ json_encode(Auth::user())}} --}}
                {{-- @livewire('navigation-dropdown') --}}
            </div>
            {{-- <x-jet-welcome /> --}}
        </div>
    </div>
</x-app-layout>
