<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lava Coach') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body>
        <div class="font-sans {{ Auth::user()->personal_settings['Dark Mode'] ? 'text-white' : 'text-gray' }} -900 antialiased">
            18 U.S.C. Section 2257 Compliance Notice

            Any and all persons that appear in any visual image, video, or other portrayal of actual sexually explicit conduct appearing or otherwise contained within LavaCoach.social were over the age of eighteen (18) years at the time the visual image was created.
    
            Exemption Statement -- Content Produced by Third Parties: 
            
            The owners and operators of LavaCoach.social are not the "producers," as such term is defined in 18 U.S.C. 2257 or subsequent case law, of any of the visual content contained in this website. All Third Parties that upload content on to this website must adhere to, and comply with USC 2257. Pursuant to Title 18 U.S.C. §2257(h)(2)(B)(v) and 47 U.S.C. §230(c), the operators of this website reserve the right to delete content posted by Third Parties which operators deem to be indecent, obscene, defamatory or inconsistent with their policies and terms of service.
            
            Questions or comments regarding this Exemption Statement should be addressed to: support@LavaCoach.social
        </div>
    </body>
</html>
