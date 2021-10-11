<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl {{ Auth::user()->personal_settings['Dark Mode'] ? '{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800' : 'dark-text-mode' }} leading-tight">
          {{ __('dashboard.home') }} / <a href="{{ route('purchased') }}">{{ __('dashboard.purchased') }} </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          @livewire('approve-users')

    </div>
</x-app-layout>
@livewire('mobile-footer')