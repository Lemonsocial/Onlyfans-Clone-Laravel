<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -700 uppercase tracking-widest shadow-sm hover:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:{{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -800 active:bg-gray-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
