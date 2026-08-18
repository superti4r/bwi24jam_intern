@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
    <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">Udah saat nya kamu gabung</p>
        <h1 class="mt-4 text-4xl font-semibold leading-tight tracking-[-0.06em] sm:text-5xl">Buat akun kamu</h1>
        <p class="mt-4 max-w-md text-base leading-7 text-muted">Platform terpercaya dari {{ config('app.name') }} dengan
            sejuta artikel dan berita terkini.</p>
        <form method="POST" action="{{ route('register') }}" class="mt-10 flex flex-col gap-6">
            @csrf
            <div class="flex flex-col gap-2"><label for="name" class="text-sm font-medium">Nama</label><input id="name"
                    name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                    placeholder="Masukkan nama kamu"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <div class="flex flex-col gap-2"><label for="email" class="text-sm font-medium">Alamat email</label><input
                    id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                    placeholder="Masukkan alamat email kamu"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <div class="flex flex-col gap-2"><label for="password" class="text-sm font-medium">Password</label><input
                    id="password" name="password" type="password" required autocomplete="new-password"
                    placeholder="Buat password kamu"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <div class="flex flex-col gap-2"><label for="password_confirmation" class="text-sm font-medium">Konfirmasi
                    password</label><input id="password_confirmation" name="password_confirmation" type="password" required
                    autocomplete="new-password" placeholder="Konfirmasi password kamu"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <button type="submit" data-motion-interaction
                class="min-h-12 bg-primary px-5 text-base font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Buat
                Akun</button>
        </form>
        <p class="mt-8 text-sm text-muted">Udah punya akun? <a href="{{ route('login') }}" data-motion-interaction
                class="font-semibold text-foreground underline underline-offset-4 hover:text-primary">Masuk</a></p>
    </div>
@endsection