@extends('layouts.app')

@section('title', 'Tambah Halaman')

@section('content')
    <div class="page">
        <div class="page__header">
            <div class="page__headline">
                <h1 class="page__title">Tambah Halaman</h1>
                <p class="page__description">Buat halaman custom baru.</p>
            </div>

            <div class="page__action">
                <a href="{{ route('administrator.pages.index') }}" class="button button--outline">
                    <x-icons.arrow-left class="w-4 h-4" />
                    Kembali
                </a>
            </div>
        </div>

        <x-app.alert />

        <div class="card w-full">
            <div class="card__header card__header--alt">
                <h2 class="card__title m-0">Form Tambah Halaman</h2>
            </div>

            <form method="POST" action="{{ route('administrator.pages.store') }}" class="space-y-4">
                @csrf

                <div class="card__body">
                    <div class="flex flex-col gap-4">
                        <div class="field">
                            <label for="title" class="field__label">Judul</label>
                            <input id="title" type="text" name="title" class="input" placeholder="cth. Kontak"
                                value="{{ old('title') }}" required autofocus>
                            @error('title')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field max-w-md">
                            <label for="slug" class="field__label">Slug</label>
                            <input id="slug" type="text" name="slug" class="input" placeholder="cth. contact"
                                value="{{ old('slug') }}" required>
                            <p class="field__description">Diisi manual. Hanya huruf kecil, angka, dan tanda hubung.</p>
                            @error('slug')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="content" class="field__label">Konten</label>
                            <div id="editor" data-quill></div>
                            <textarea name="content" id="content" class="hidden">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field max-w-md">
                            <label for="status" class="field__label">Status</label>
                            <select id="status" name="status" class="select" data-stisla-select
                                data-placeholder="Pilih Status" aria-label="Status" required>
                                <option value=""></option>
                                @foreach (App\Enum\Status::cases() as $status)
                                    <option value="{{ $status->value }}" @selected(old('status', App\Enum\Status::DRAFT->value) === $status->value)>
                                        {{ $status->label() }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card__footer justify-end">
                    <a href="{{ route('administrator.pages.index') }}" class="button button--outline">
                        Batal
                    </a>
                    <button type="submit" class="button button--primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
