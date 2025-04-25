<!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>{{ config('app.name') }}</title>

            @vite(['resources/css/app.css', 'resources/js/app.js'])

            {{-- cdn icons --}}
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

            {{-- google font --}}
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
        </head>

    <body>
        <x-navbar />

        <div class="container wh-100">
            {{ $slot }}
        </div>


        <x-footer />

    </body>

</html>
