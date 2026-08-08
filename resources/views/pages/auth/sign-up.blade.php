@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
    <section class="w-full">

        <div class="mb-6">
            <h1 class="text-xl font-semibold sm:text-2xl">
                Buat Akun Baru
            </h1>

            <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400">
                Daftar akun Anda untuk mulai menggunakan layanan kami.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert--primary my-6">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-4" method="post" action="{{ route('register') }}">
            @csrf

            <div class="field">
                <label for="name" class="field__label">
                    Nama
                </label>
                <input id="name" type="text" name="name" class="input" placeholder="Masukkan nama Anda"
                    value="{{ old('name') }}" required autofocus>
            </div>

            <div class="field">
                <label for="email" class="field__label">
                    Email
                </label>
                <input id="email" type="email" name="email" class="input" placeholder="Masukkan email Anda"
                    value="{{ old('email') }}" required>
            </div>

            <div class="field">
                <label for="password" class="field__label">
                    Password
                </label>
                <input id="password" type="password" name="password" class="input" placeholder="Buat password" required>
            </div>

            <div class="field">
                <label for="password_confirmation" class="field__label">
                    Konfirmasi Password
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="input"
                    placeholder="Ulangi password" required>
            </div>

            <div class="field w-auto pt-1">
                <div class="field__item">
                    <input class="checkbox" type="checkbox" name="terms" id="terms" required>
                    <label class="field__label" for="terms">
                        Saya setuju dengan <a href="#" class="link">syarat dan ketentuan</a>
                    </label>
                </div>
            </div>

            <button type="submit" class="button button--primary w-full">
                Daftar
            </button>

            <p class="pt-1 text-center text-sm text-gray-500 dark:text-gray-400">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="link">
                    Masuk
                </a>
            </p>
        </form>

    </section>
@endsection