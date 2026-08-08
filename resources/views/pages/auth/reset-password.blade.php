@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <section class="w-full">

        <div class="mb-6">
            <h1 class="text-xl font-semibold sm:text-2xl">
                Reset Password
            </h1>

            <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400">
                Buat password baru untuk mengamankan akun Anda.
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

        <form class="space-y-4" method="post" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div class="field">
                <label for="email" class="field__label">
                    Email
                </label>
                <input id="email" type="email" name="email" class="input" placeholder="Masukkan email Anda"
                    value="{{ request()->email ?? old('email') }}" required autofocus>
            </div>

            <div class="field">
                <label for="password" class="field__label">
                    Password Baru
                </label>
                <input id="password" type="password" name="password" class="input" placeholder="Masukkan password baru"
                    required>
            </div>

            <div class="field">
                <label for="password_confirmation" class="field__label">
                    Konfirmasi Password
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="input"
                    placeholder="Ulangi password baru" required>
            </div>

            <button type="submit" class="button button--primary w-full">
                Reset Password
            </button>

            <p class="pt-1 text-center text-sm text-gray-500 dark:text-gray-400">
                Ingat password Anda?
                <a href="{{ route('login') }}" class="link">
                    Masuk
                </a>
            </p>

        </form>

    </section>
@endsection