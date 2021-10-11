<div>
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('dashboard.stripe_connect') }}
        </x-slot>
        <x-slot name="description">
            {{ __('dashboard.describe_stripe_connect') }}

            
            @if(Auth::user()->stripe_verified)
            {{ __('dashboard.stripe_already_verified') }}
            @else
            {{ __('dashboard.stripe_not_verified') }}
            @endif
        </x-slot>
        {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    
    <x-slot name="content">
        

        <button wire:click="connectStripe" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled">
            <div id="connectStripe"></div>
            {{ __('dashboard.connect_with_stripe') }}
        </button>

    {{-- <img src="/img/blue-on-dark@2x.png"></img --}}
        {{-- <div>
            @if(!empty(Auth::user()->background_photo_path))
            <h2> current background image </h2>
            <img style="max-height:100px;width:auto;" src="/storage/{{Auth::user()->background_photo_path}}">
            @endif
            <form wire:submit.prevent="save">
                <input type="file" wire:model="photo">
                @error('photo') <span class="error">{{ $message }}</span> @enderror
                <button type="submit">Save Photo</button>
            </form>
        </div> --}}
    </x-slot>
    
    </x-jet-action-section>
    </div>