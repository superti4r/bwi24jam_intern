@extends('layouts.app')

@section('title', 'Ubah Kategori')

@section('content')
    <div class="page">
        <div class="page__header">
            <div class="page__headline">
                <h1 class="page__title">Ubah Kategori</h1>
                <p class="page__description">Perbarui informasi kategori artikel.</p>
            </div>

            <div class="page__action">
                <a href="{{ route('administrator.categories.index') }}" class="button button--outline">
                    <x-icons.arrow-left class="w-4 h-4" />
                    Kembali
                </a>
            </div>
        </div>

        <x-app.alert />

        <div class="card w-full">
            <div class="card__header card__header--alt">
                <h2 class="card__title m-0">Form Ubah Kategori</h2>
            </div>

            <form method="POST" action="{{ route('administrator.categories.update', $category) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="card__body">
                    <div class="flex flex-col gap-4">
                        <div class="field max-w-md">
                            <label for="name" class="field__label">Nama Kategori</label>
                            <input id="name" type="text" name="name" class="input" placeholder="cth. Berita"
                                value="{{ old('name', $category->name) }}" required autofocus>
                            @error('name')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field max-w-md">
                            <label for="slug" class="field__label">Slug</label>
                            <input id="slug" type="text" name="slug" class="input" disabled
                                value="{{ old('slug', $category->slug) }}">
                            <p class="field__description">Slug tidak dapat diubah setelah dibuat.</p>
                            @error('slug')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card__footer justify-end">
                    <a href="{{ route('administrator.categories.index') }}" class="button button--outline">
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
