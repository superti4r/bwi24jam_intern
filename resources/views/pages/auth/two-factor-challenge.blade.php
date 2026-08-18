@extends('layouts.auth')

@section('title', 'Autentikasi Dua Faktor')

@section('content')
    <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">Keamanan Akun</p>
        <h1 class="mt-4 text-4xl font-semibold leading-tight tracking-[-0.06em] sm:text-5xl">Konfirmasi Masuk</h1>
        <p class="mt-5 max-w-md text-base leading-7 text-muted">Masukkan kode autentikasi dari aplikasi autentikasi Anda,
            atau gunakan kode pemulihan.</p>
        <form method="POST" action="{{ route('two-factor.login') }}" class="mt-10 flex flex-col gap-6">
            @csrf
            <div class="flex flex-col gap-2"><label for="code" class="text-sm font-medium">Kode Autentikasi</label><input
                    id="code" name="code" type="text" inputmode="numeric" autocomplete="one-time-code" autofocus
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <div class="flex flex-col gap-2"><label for="recovery_code" class="text-sm font-medium">Kode
                    Pemulihan</label><input id="recovery_code" name="recovery_code" type="text" autocomplete="off"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <button type="submit" data-motion-interaction
                class="min-h-12 bg-primary px-5 text-base font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Lanjutkan</button>
        </form>
    </div>
@endsection