@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div>
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">Akses akun</p>
        <h1 class="mt-4 text-4xl font-semibold leading-tight tracking-[-0.06em] sm:text-5xl">Pilih password baru</h1>
        <form method="POST" action="{{ route('password.update') }}" class="mt-10 flex flex-col gap-6">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="flex flex-col gap-2"><label for="email" class="text-sm font-medium">Alamat email</label><input
                    id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus
                    autocomplete="email"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <div class="flex flex-col gap-2"><label for="password" class="text-sm font-medium">Password baru</label><input
                    id="password" name="password" type="password" required autocomplete="new-password"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <div class="flex flex-col gap-2"><label for="password_confirmation" class="text-sm font-medium">Konfirmasi
                    password baru</label><input id="password_confirmation" name="password_confirmation" type="password"
                    required autocomplete="new-password"
                    class="min-h-12 border border-border bg-background px-4 text-base outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <button type="submit" data-motion-interaction
                class="min-h-12 bg-primary px-5 text-base font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Perbarui
                password</button>
        </form>
    </div>
@endsection