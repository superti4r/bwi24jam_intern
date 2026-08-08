<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::auth')] #[Title('Reset Password')] class extends Component {
    // ...
};
?>

<div>
    <section class="w-full">

        <div class="mb-6">
            <h1 class="text-xl font-semibold sm:text-2xl">
                Reset Password
            </h1>

            <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400">
                Buat password baru untuk mengamankan akun Anda.
            </p>
        </div>


        <form class="space-y-4">

            <div class="field">
                <label for="password" class="field__label">
                    Password Baru
                </label>

                <input id="password" type="password" class="input" placeholder="Masukkan password baru">
            </div>


            <div class="field">
                <label for="password_confirmation" class="field__label">
                    Konfirmasi Password
                </label>

                <input id="password_confirmation" type="password" class="input" placeholder="Ulangi password baru">
            </div>


            <button type="button" class="button button--primary w-full">
                Reset Password
            </button>


            <p class="pt-1 text-center text-sm text-gray-500 dark:text-gray-400">

                Ingat password Anda?

                <a href="#" class="link">
                    Masuk
                </a>

            </p>

        </form>

    </section>
</div>