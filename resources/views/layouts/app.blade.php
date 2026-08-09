<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') &mdash; {{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        document.documentElement.classList.toggle(
            "dark",
            localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        );
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen transition-colors duration-200">

    <x-preloader />

    <x-app.header />

    <x-app.weather />

    <main class="flex-1 w-full max-w-screen-2xl mx-auto px-4 md:px-8 py-6 lg:py-10">
        @yield('content')
    </main>

    <x-app.footer />

    <x-app.toast />

</body>

</html>