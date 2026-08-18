@extends('layouts.auth')

@section('title', 'Verifikasi Email')

@section('content')
    <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">Satu tahap lagi</p>
        <h1 class="mt-4 text-4xl font-semibold leading-tight tracking-[-0.06em] sm:text-5xl">Verifikasi alamat email Anda
        </h1>
        <p class="mt-5 max-w-md text-base leading-7 text-muted">Sebelum melanjutkan, silakan periksa kotak masuk Anda untuk
            tautan verifikasi.</p>
        <form method="POST" action="{{ route('verification.send') }}" class="mt-10"><button type="submit"
                data-motion-interaction
                class="min-h-12 bg-primary px-5 text-base font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Kirim
                ulang email verifikasi</button></form>
        <form method="POST" action="{{ route('logout') }}" class="mt-8"><button type="submit" data-motion-interaction
                class="text-sm font-semibold text-foreground underline underline-offset-4 hover:text-primary">Keluar</button>
        </form>
    </div>
@endsection