<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ruang kerja BWI 24 Jam.">
    <link rel="icon" type="image/jpeg" href="/images/bwi24jam_favicon.jpg">
    <title>{{ config('app.name') }} / @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-foreground antialiased">
    <div class="min-h-screen">
        @include('components.app.app-menu-dashboard')
        <main>@yield('content')</main>
    </div>
</body>
</html>
