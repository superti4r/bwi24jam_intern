<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') &mdash; {{ config('app.name') }}</title>

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

<body>

    <x-preloader />

    @yield('content')

</body>

</html>