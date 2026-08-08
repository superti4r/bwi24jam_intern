<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::auth')] #[Title('Lupa Password')] class extends Component {
    // ...
};
?>

<div>
    <section class="w-full">

        <div class="mb-6">
            <h1 class="text-xl font-semibold sm:text-2xl">
                Lupa Password
            </h1>

            <p class="mt-1.5 text-sm text-gray-500 dark:text-gray-400">
                Masukkan email Anda untuk menerima tautan reset password.
            </p>
        </div>


        <form class="space-y-4">

            <div class="field">
                <label for="email" class="field__label">
                    Email
                </label>

                <input id="email" type="email" class="input" placeholder="Masukkan email Anda">
            </div>


            <button type="button" class="button button--primary w-full">
                Kirim Tautan Reset Password
            </button>

            <p class="pt-1 text-center text-sm text-gray-500 dark:text-gray-400">

                Sudah ingat password Anda?

                <a href="#" class="link">
                    Masuk
                </a>

            </p>

        </form>

    </section>
</div>