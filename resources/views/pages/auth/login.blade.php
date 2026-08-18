@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
    <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">Halo, Selamat datang</p>
        <h1 class="mt-4 text-4xl font-semibold leading-tight tracking-[-0.06em] sm:text-5xl">Masuk ke akun kamu</h1>
        <p class="mt-4 max-w-md text-base leading-7 text-muted">Kelola akun dan artikel di {{ config('app.name') }}</p>

        <form method="POST" action="{{ route('login') }}" class="mt-10 flex flex-col gap-6">
            @csrf
            <div class="flex flex-col gap-2"><label for="email" class="text-sm font-medium">Email</label><input id="email"
                    name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                    placeholder="Masukkan email kamu"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between gap-4"><label for="password"
                        class="text-sm font-medium">Password</label><a href="{{ route('password.request') }}"
                        data-motion-interaction
                        class="text-sm text-muted underline underline-offset-4 hover:text-primary">Lupa password?</a>
                </div><input id="password" name="password" type="password" required autocomplete="current-password"
                    placeholder="Masukkan password kamu"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <label class="flex items-center gap-3 text-sm text-muted"><input name="remember" type="checkbox" value="1"
                    class="size-4 accent-primary"> Ingat saya</label>
            <button type="submit" data-motion-interaction
                class="min-h-12 bg-primary px-5 text-base font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Masuk</button>
        </form>
        <p class="mt-8 text-sm text-muted">Masih baru? <a href="{{ route('register') }}" data-motion-interaction
                class="font-semibold text-foreground underline underline-offset-4 hover:text-primary">Buat akun</a>
        </p>
    </div>
@endsection