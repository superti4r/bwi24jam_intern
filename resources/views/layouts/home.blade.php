<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Field Notes is an independent editorial publication about culture, cities, design, and everyday technology.">
    <link rel="icon" type="image/jpeg" href="/images/bwi24jam_favicon.jpg">
    <title>{{ config('app.name') }} &mdash; @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="flex min-h-screen">
        @include('components.home.app-menu')
        <div class="min-w-0 flex-1">
            @yield('content')
        </div>
    </div>
</body>
</html>
