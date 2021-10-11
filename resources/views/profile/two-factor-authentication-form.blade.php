<x-jet-action-section>
    <x-slot name="title">
        {{ __('dashboard.two_factor_auth') }}
    </x-slot>

    <x-slot name="description">
        {{ __('dashboard.two_factor_auth_desc') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -900">
            @if ($this->enabled)
                {{ __('dashboard.you_enabled_two_auth') }}
            @else
                {{ __('dashboard.you_disabled_two_auth') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -600">
            <p>
                {{ __('dashboard.about_two_auth') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -600">
                    <p class="font-semibold">
                        {{ __('dashboard.update_password') }}
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -600">
                    <p class="font-semibold">
                        {{ __('dashboard.about_two_auth_qr') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('dashboard.enable') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('dashboard.regenerate_recovery_codes') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('dashboard.show_recovery_codes') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        {{ __('dashboard.disable') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>
