@extends('layouts.app')

@section('title', 'Ubah User')

@section('content')
    <div class="page">
        <div class="page__header">
            <div class="page__headline">
                <h1 class="page__title">Ubah User</h1>
                <p class="page__description">Perbarui informasi akun pengguna.</p>
            </div>

            <div class="page__action">
                <a href="{{ route('administrator.users.index') }}" class="button button--outline">
                    <x-icons.arrow-left class="w-4 h-4" />
                    Kembali
                </a>
            </div>
        </div>

        <x-app.alert />

        <div class="card w-full">
            <div class="card__header card__header--alt">
                <h2 class="card__title m-0">Form Ubah User</h2>
            </div>

            <form method="POST" action="{{ route('administrator.users.update', $user) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="card__body">
                    <div class="flex flex-col gap-4">
                        <div class="field">
                            <label for="name" class="field__label">Nama</label>
                            <input id="name" type="text" name="name" class="input" placeholder="Masukkan nama lengkap"
                                value="{{ old('name', $user->name) }}" required autofocus>
                            @error('name')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="email" class="field__label">Email</label>
                            <input id="email" type="email" name="email" class="input" placeholder="nama@contoh.com"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password" class="field__label">Password</label>
                            <input id="password" type="password" name="password" class="input"
                                placeholder="Kosongkan jika tidak ingin diubah">
                            <p class="field__description">Kosongkan jika password tidak ingin diubah.</p>
                            @error('password')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password_confirmation" class="field__label">Konfirmasi Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="input"
                                placeholder="Ulangi password baru">
                        </div>

                        <div class="field max-w-sm">
                            <label for="role" class="field__label">Role</label>
                            <select id="role" name="role" class="select" data-stisla-select data-placeholder="Pilih Role"
                                aria-label="Role" required>
                                <option value=""></option>
                                @foreach (App\Enum\Role::cases() as $role)
                                    <option value="{{ $role->value }}" @selected(old('role', $user->role->value) === $role->value)>
                                        {{ $role->value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card__footer justify-end">
                    <a href="{{ route('administrator.users.index') }}" class="button button--outline">
                        Batal
                    </a>
                    <button type="submit" class="button button--primary">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection