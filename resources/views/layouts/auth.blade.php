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

<body class="min-h-screen">

    <x-preloader />

    <main class="min-h-screen lg:grid lg:grid-cols-2">

        <section class="flex min-h-screen items-center justify-center px-5 py-10 sm:px-8 lg:px-10">

            <div class="w-full max-w-sm">

                @yield('content')

            </div>

        </section>


        <section class="relative hidden lg:block">

            <img src="{{ asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp') }}" alt="bwi24jam"
                class="absolute inset-0 h-full w-full object-cover">

        </section>

    </main>

</body>

</html>