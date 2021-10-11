

<div>
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('dashboard.update_background') }}
        </x-slot>
        <x-slot name="description">
            
        </x-slot>
        {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    
    <x-slot name="content">
    
        <div>
            @if(!empty(Auth::user()->background_photo_path))
            <h2> current background image </h2>
            <img style="max-height:100px;width:auto;" src="/storage/{{Auth::user()->background_photo_path}}">
            @endif
            <form wire:submit.prevent="save">
                <input type="file" wire:model="photo">
                @error('photo') <span class="error">{{ $message }}</span> @enderror
                <br>
                <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -700 uppercase tracking-widest shadow-sm hover:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2" type="submit">Save Photo</button>
            </form>
        </div>
    </x-slot>
    
    </x-jet-action-section>
    </div>