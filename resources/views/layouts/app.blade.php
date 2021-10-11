<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
    {{-- <html lang="{{Auth::user()->personal_settings['Language']}}" dir="{{locale()->dir()}}"> --}}
        <html lang="{{Auth::user()->personal_settings['Language']}}" dir="{{locale()->dir()}}">
       {{-- test --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="/img/favicon.ico" >
        <title>{{ config('app.name', 'Lava Coach') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased {{ Auth::user()->personal_settings['Dark Mode'] ? 'dark-theme' : 'light-theme' }}">
        
        <div class="min-h-screen {{ Auth::user()->personal_settings['Dark Mode'] ? 'bg-black' : 'bg-white' }}">
            
            {{-- {{Auth::user()->personal_settings->{'Language'}}} --}}
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="{{ Auth::user()->personal_settings['Dark Mode'] ? 'bg-black' : 'bg-white' }} shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        
    </body>
</html>
