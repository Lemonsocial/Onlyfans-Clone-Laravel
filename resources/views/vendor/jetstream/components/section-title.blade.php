<div class="md:col-span-1">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -900">{{ $title }}</h3>

        <p class="mt-1 text-sm {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -600">
            {{ $description }}
        </p>
    </div>
</div>
