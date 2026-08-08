@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
    <section class="w-full">

        <div class="mb-6">
            <h1 class="text-xl font-semibold sm:text-2xl">
                Lupa Password
            </h1>

            <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400">
                Masukkan email Anda untuk menerima tautan reset password.
            </p>
        </div>

        @if (session('status'))
            <div class="alert alert--success my-6">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert--danger my-6">
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-4" method="post" action="{{ route('password.email') }}">
            @csrf

            <div class="field">
                <label for="email" class="field__label">
                    Email
                </label>
                <input id="email" type="email" name="email" class="input" placeholder="Masukkan email Anda"
                    value="{{ old('email') }}" required autofocus>
            </div>

            <button type="submit" class="button button--primary w-full">
                Kirim Tautan Reset Password
            </button>

            <p class="pt-1 text-center text-sm text-gray-500 dark:text-gray-400">
                Sudah ingat password Anda?
                <a href="{{ route('login') }}" class="link">
                    Masuk
                </a>
            </p>

        </form>

    </section>
@endsection