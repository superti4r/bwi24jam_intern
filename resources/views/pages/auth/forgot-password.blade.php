@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
    <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">Akses akun</p>
        <h1 class="mt-4 text-4xl font-semibold leading-tight tracking-[-0.06em] sm:text-5xl">Reset password kamu</h1>
        <p class="mt-4 max-w-md text-base leading-7 text-muted">Masukkan email yang terdaftar di {{ config('app.name') }}
            dan kami akan mengirimkan link untuk mereset password kamu.</p>
        <form method="POST" action="{{ route('password.email') }}" class="mt-10 flex flex-col gap-6">
            @csrf
            <div class="flex flex-col gap-2"><label for="email" class="text-sm font-medium">Email</label><input id="email"
                    name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                    placeholder="Masukkan email kamu"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <button type="submit" data-motion-interaction
                class="min-h-12 bg-primary px-5 text-base font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Kirim
                Link Reset Password</button>
        </form>
        <p class="mt-8 text-sm text-muted"><a href="{{ route('login') }}" data-motion-interaction
                class="font-semibold text-foreground underline underline-offset-4 hover:text-primary">Kembali masuk</a>
        </p>
    </div>
@endsection