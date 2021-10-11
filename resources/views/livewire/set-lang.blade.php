<div>
<x-jet-action-section>
    <x-slot name="title">
        {{ __('dashboard.translation_settings') }}
    </x-slot>
    <x-slot name="description">
        {{json_encode(Auth::user()->personal_settings['Language'])}}
    </x-slot>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

<x-slot name="content">

    <form wire:submit.prevent="submit">
        {{-- <input type="text" wire:model="locale"> --}}
        @error('locale') <span class="error">{{ $message }}</span> @enderror
        {{-- <buttonSet Locale</button> --}}
        <select wire:model="locale" required>
            <option value="none" selected> 
                Select an Option 
            </option> 
            <option 
            selected value="en">English
            </option>

            <option
                value="sc">Simplified Chinese
            </option>
            <option 
                value="tc">Traditional Chinese
            </option>
            
            <option 
                value="pg">Portguguese
            </option>

            <option 
                 value="sp">Spanish
            </option>

            <option
                value="jp">Japanese
            </option>

            <option 
                value="kr">Korean
            </option>

            <option 
                 value="gm">German
            </option>

            <option name="locale"
                value="it">Italian
            </option>

        </select>
        <br>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled">
            
            {{ __('dashboard.update_prefered_language') }}
        </button>
    </form>
    {{-- <h2>
        Current Language Select {{json_encode(Auth::user()->personal_settings['Language'])}}
     </h2> --}}
</x-slot>

</x-jet-action-section>
</div>