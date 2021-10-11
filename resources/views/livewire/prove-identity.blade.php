<div>
    <x-jet-action-section>
        <x-slot name="title">
            {{ __('dashboard.verify_identity') }}
        </x-slot>
        <x-slot name="description">
            @if(Auth::user()->is_majority)
            <p style="color:green;"> {{__('your identification has already been verified by our staff..')}}</p>
            @elseif(Auth::user()->identification['identification_type'] !== 'none')
            <p style="color:orange;"> {{__('your identificaiton is under review. expect an email soon..')}}</p>
            @else
            {{ __('dashboard.verify_identity_desc') }}
            @endif
        </x-slot>

    <x-slot name="content">
        <div>
            @if(Auth::user()->is_majority)
                <p> {{__('your identification has already been verified by our staff.. ')}}</p>
                
            @else
            <p> {{ __('Upload your identification along with release forms here. Our staff will review your documents and provide an update on this page shortly telling you whether or not your information has been accepted. Resubmitting imagines automatically creates a new request for our staff which will supercede the previous one.')}}</p>
            <br>    
            <form  wire:submit.prevent="save">
                {{-- <form wire:submit="submit($formData)"> --}}
                <div class="mt-4">
                    <x-jet-label for="photo_front" value="{{ __('Front side of your Photo Identification') }}" />
                    <input id="photo_front" wire:model="photo_front" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -700 uppercase tracking-widest shadow-sm hover:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2" type="file" >
                    @error('photo_front') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <br>
                <div class="mt-4">
                    <x-jet-label for="photo_side_by_side" value="{{ __('Holding ID Next to Your Face') }}" />
                    <input id="photo_side_by_side" wire:model="photo_side_by_side" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -700 uppercase tracking-widest shadow-sm hover:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2" type="file" >
                    @error('photo_side_by_side') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="mt-4">
                    <x-jet-label for="idtype" value="{{ __('Identificaiton Type') }}" />
                    <select id="idtype" class="form-input rounded-md shadow-sm block mt-1 w-full" wire:model="idtype" required>
                        <option value="none" selected> 
                            Select an Option 
                        </option> 
                        <option 
                            value="passport">{{ __('Passport') }}
                        </option>
                        <option
                            value="id">{{ __('ID Card') }}
                        </option>
                        <option 
                            value="license">{{ __('Drivers License') }}
                        </option>
                    </select>
                    @error('idtype') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="idexpires" value="{{ __('dashboard.id_expiration_date') }}" />
                    <input id="idexpires" wire:model="idexpires" class="form-input rounded-md shadow-sm block mt-1 w-full" type="date" id="idexpires" name="idexpires">
                    @error('idexpires') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="releases" value="{{ __('Release Forms') }}" />
                    <a href="/img/model_release.pdf" target="_blank">{{ __('download example') }}</a>
                    <br>
                    <input class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -700 uppercase tracking-widest shadow-sm hover:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 mr-2" type="file" wire:model="releases" multiple>

                    @error('releases') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" >
                        {{ __('Upload and Verify') }}
                </button>
                </div>
            </form>
            @endif
        </div>
    </x-slot>

    </x-jet-action-section>
    </div>
    @push('scripts')
    <script>
        
        var picker = new Pikaday({
            field: document.getElementById('idexpires');
            format: 'D MMM YYYY',
            onSelect: function() {
                console.log(this.getMoment().format('Do MMMM YYYY'));
            }
        });
    </script>
    @endpush