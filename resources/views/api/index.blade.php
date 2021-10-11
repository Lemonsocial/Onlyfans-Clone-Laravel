<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800 leading-tight">
            {{ __('navigation.api_tokens') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-app-layout>
