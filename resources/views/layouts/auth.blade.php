<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BWI 24 Jam authentication.">
    <link rel="icon" type="image/jpeg" href="/images/bwi24jam_favicon.jpg">
    <title>{{ config('app.name') }} &mdash; @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-background text-foreground antialiased">
    <main class="grid min-h-screen lg:grid-cols-[minmax(18rem,0.8fr)_minmax(28rem,1.2fr)]">
        <aside class="relative hidden overflow-hidden bg-primary lg:flex lg:flex-col lg:justify-between lg:p-12">
            <div
                class="absolute inset-0 bg-[url('/images/bwi24jam_hero.webp')] bg-cover bg-center opacity-20 mix-blend-multiply">
            </div>
            <div class="absolute inset-0 bg-primary/75"></div>
            <div class="relative z-10">
                <a href="{{ route('home') }}" aria-label="BWI 24 Jam home"
                    class="inline-flex focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-4 focus-visible:ring-offset-primary">
                    <img src="/images/bwi24jam_image.png" alt="BWI 24 Jam"
                        class="h-auto w-full max-w-[13rem] object-contain object-left">
                </a>
            </div>
            <div class="relative z-10 max-w-sm text-white">
                <p class="text-2xl font-semibold leading-tight tracking-[-0.04em]">The Power Of Networking.</p>
                <p class="mt-5 text-sm leading-6 text-white/70">Kekuatan Jaringan Informasi Terbuka untuk Seluruh
                    Masyarakat Banyuwangi.</p>
            </div>
            <p class="relative z-10 text-xs text-white/55">{{ config('app.name') }} &copy; {{ date('Y') }}</p>
        </aside>

        <section class="flex min-h-screen flex-col px-5 py-8 sm:px-8 sm:py-12 lg:px-16 lg:py-14">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}"
                    class="lg:hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4"
                    aria-label="BWI 24 Jam home">
                    <img src="/images/bwi24jam_image.png" alt="BWI 24 Jam"
                        class="h-auto w-full max-w-[7rem] object-contain object-left">
                </a>
            </div>

            <div class="mx-auto flex w-full max-w-xl flex-1 items-center py-12 lg:py-20">
                <div class="w-full">
                    @if (session('status'))
                        <div class="mb-6 border-l-2 border-primary bg-surface px-4 py-3 text-sm leading-6 text-foreground"
                            role="status">{{ session('status') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="mb-6 border-l-2 border-primary bg-surface px-4 py-3 text-sm leading-6 text-foreground"
                            role="alert">
                            <p class="font-semibold">Tolong cek lagi ya!</p>
                            <ul class="mt-2 list-disc pl-5 text-muted">@foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>

        </section>
    </main>
</body>

</html>