@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')

    <section class="w-full">

        <div class="mb-6">
            <h1 class="text-xl font-semibold sm:text-2xl">
                Hai, Selamat Datang
            </h1>

            <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400">
                Silahkan masuk ke akun Anda untuk melanjutkan.
            </p>
        </div>


        <form class="space-y-4">

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

                <input id="password" type="password" class="input" placeholder="Masukkan password Anda">
            </div>


            <div class="flex items-center justify-between pt-1">

                <div class="field w-auto">
                    <div class="field__item">
                        <input class="checkbox" type="checkbox" id="remember">

                        <label class="field__label" for="remember">
                            Ingat saya
                        </label>
                    </div>
                </div>


                <a href="#" class="link text-sm">
                    Lupa password?
                </a>

            </div>


            <button type="button" class="button button--primary w-full">
                Masuk
            </button>


            <p class="pt-1 text-center text-sm text-gray-500 dark:text-gray-400">

                Belum punya akun?

                <a href="#" class="link">
                    Buat akun
                </a>

            </p>

        </form>

    </section>

@endsection