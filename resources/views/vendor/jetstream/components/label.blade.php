@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -700']) }}>
    {{ $value ?? $slot }}
</label>
