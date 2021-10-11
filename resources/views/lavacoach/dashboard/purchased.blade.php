<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800 leading-tight">
        <a href="{{ route('home') }}">{{ __('dashboard.home') }} </a> / {{ __('dashboard.purchased') }} 
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="{{ Auth::user()->personal_settings['Dark Mode'] ? 'bg-black' : 'bg-white' }} overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -900">
                      <section style="font-size:20px;"><a href="javascript:history.back()">&larr; {{ __('dashboard.return') }}</a></section>
                    </h3>
                    {{-- <p class="mt-1 max-w-2xl text-sm leading-5 {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -500">
                      Personal details and application.
                    </p> --}}
                    <hr>
                    <div>
                      Paid Message Feed
                      
                    </div>
                  </div>
          </div>
  </div>
</x-app-layout>
@livewire('mobile-footer')