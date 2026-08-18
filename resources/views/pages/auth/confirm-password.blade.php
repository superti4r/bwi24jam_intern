@extends('layouts.auth')

@section('title', 'Konfirmasi Password')

@section('content')
    <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">Opps!</p>
        <h1 class="mt-4 text-4xl font-semibold leading-tight tracking-[-0.06em] sm:text-5xl">Konfirmasi password kamu</h1>
        <p class="mt-5 max-w-md text-base leading-7 text-muted">Untuk keamanan Anda, harap konfirmasi password Anda sebelum melanjutkan.</p>
        <form method="POST" action="{{ route('password.confirm') }}" class="mt-10 flex flex-col gap-6">
            @csrf
            <div class="flex flex-col gap-2"><label for="password" class="text-sm font-medium">Password</label><input id="password" name="password" type="password" required autocomplete="current-password" autofocus placeholder="Masukkan password kamu" class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20"></div>
            <button type="submit" data-motion-interaction class="min-h-12 bg-primary px-5 text-base font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Konfirmasi password</button>
        </form>
    </div>
@endsection
