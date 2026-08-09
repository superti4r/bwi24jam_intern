@extends('layouts.app')

@section('title', 'Ubah Artikel')

@section('content')
    <div class="page">
        <div class="page__header">
            <div class="page__headline">
                <h1 class="page__title">Ubah Artikel</h1>
                <p class="page__description">Perbarui informasi artikel.</p>
            </div>

            <div class="page__action">
                <a href="{{ route('articles.index') }}" class="button button--outline">
                    <x-icons.arrow-left class="w-4 h-4" />
                    Kembali
                </a>
            </div>
        </div>

        <x-app.alert />

        <div class="card w-full">
            <div class="card__header card__header--alt">
                <h2 class="card__title m-0">Form Ubah Artikel</h2>
            </div>

            <form method="POST" action="{{ route('articles.update', $article) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="card__body">
                    <div class="flex flex-col gap-4">
                        <div class="field">
                            <label for="title" class="field__label">Judul</label>
                            <input id="title" type="text" name="title" class="input" placeholder="cth. Berita Terkini"
                                value="{{ old('title', $article->title) }}" required autofocus>
                            @error('title')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="category_id" class="field__label">Kategori</label>
                            <select id="category_id" name="category_id" class="select" data-stisla-select
                                data-placeholder="Pilih Kategori" aria-label="Kategori" required>
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $article->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="thumbnail" class="field__label">Thumbnail</label>
                            @php
                                $thumbnailUploadUrl = parse_url(route('articles.thumbnail'), PHP_URL_PATH);
                                $thumbnailRemoveUrl = parse_url(route('articles.thumbnail.remove'), PHP_URL_PATH);
                            @endphp
                            <input type="file" id="thumbnail" name="thumbnail" class="filepond"
                                data-upload-url="{{ $thumbnailUploadUrl }}" data-remove-url="{{ $thumbnailRemoveUrl }}"
                                data-existing="{{ $article->thumbnail ? '/storage/' . $article->thumbnail : '' }}">
                            <input type="hidden" name="thumbnail_path" id="thumbnail-path"
                                value="{{ old('thumbnail_path', $article->thumbnail) }}">
                            <p class="field__description">Unggah gambar thumbnail artikel. Format: jpeg, png, jpg, webp,
                                gif. Maks 10MB.</p>
                            @error('thumbnail')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="content" class="field__label">Konten</label>
                            <div id="editor" data-quill>{!! old('content', $article->content) !!}</div>
                            <textarea name="content" id="content"
                                class="hidden">{{ old('content', $article->content) }}</textarea>
                            @error('content')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="status" class="field__label">Status</label>
                            <select id="status" name="status" class="select" data-stisla-select
                                data-placeholder="Pilih Status" aria-label="Status" required>
                                <option value=""></option>
                                @foreach (App\Enum\Status::cases() as $status)
                                    <option value="{{ $status->value }}" @selected(old('status', $article->status->value) === $status->value)>
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
                    <a href="{{ route('articles.index') }}" class="button button--outline">
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