<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800 leading-tight">
            {{ __('navigation.profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                @livewire('prove-identity')
            </div>
            @livewire('profile.update-profile-information-form')
            <x-jet-section-border />
            <div class="mt-10 sm:mt-0">
                @livewire('upload-background-image')
            </div>
            <x-jet-section-border />
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <x-jet-section-border />
            
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>
            @endif

            <x-jet-section-border />
            
            <div class="mt-10 sm:mt-0">
                @livewire('stripe-settings')
            </div>
            
            <x-jet-section-border />
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
            
            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('set-lang')
            </div>
            
            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('set-dark-mode')
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
