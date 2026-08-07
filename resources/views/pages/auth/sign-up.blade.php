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


        <form class="space-y-4">

            <div class="field">
                <label for="name" class="field__label">
                    Nama
                </label>

                <input id="name" type="text" class="input" placeholder="Masukkan nama Anda">
            </div>


            <div class="field">
                <label for="email" class="field__label">
                    Email
                </label>

                <input id="email" type="email" class="input" placeholder="Masukkan email Anda">
            </div>


            <div class="field">
                <label for="password" class="field__label">
                    Password
                </label>

                <input id="password" type="password" class="input" placeholder="Buat password">
            </div>


            <div class="field">
                <label for="password_confirmation" class="field__label">
                    Konfirmasi Password
                </label>

                <input id="password_confirmation" type="password" class="input" placeholder="Ulangi password">
            </div>


            <div class="field w-auto pt-1">

                <div class="field__item">

                    <input class="checkbox" type="checkbox" id="terms">

                    <label class="field__label" for="terms">
                        Saya setuju dengan <a href="#" class="link">syarat dan ketentuan</a>
                    </label>

                </div>

            </div>


            <button type="button" class="button button--primary w-full">
                Daftar
            </button>


            <p class="pt-1 text-center text-sm text-gray-500 dark:text-gray-400">

                Sudah punya akun?

                <a href="#" class="link">
                    Masuk
                </a>

            </p>

        </form>

    </section>

@endsection