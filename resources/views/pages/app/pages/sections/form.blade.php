@extends('layouts.app')

@section('title', $section ? 'Ubah Bagian' : 'Tambah Bagian')

@section('content')
    @include('components.app.page-header', [
        'title' => $section ? 'Ubah Bagian' : 'Tambah Bagian',
        'eyebrow' => $page->title,
        'description' => 'Pilih jenis bagian, isi informasi yang sesuai, dan tentukan posisinya dalam halaman.',
    ])

    @php
        $selectedType = old('type', $section?->type->value);
        $colorOptions = [
            'primary' => 'Utama',
            'secondary' => 'Sekunder',
            'green' => 'Hijau',
            'blue' => 'Biru',
            'yellow' => 'Kuning',
            'milk' => 'Putih susu',
        ];
    @endphp

    <div class="mx-auto max-w-4xl px-5 py-8 sm:px-8 lg:px-12">
        <form method="POST"
            action="{{ $section ? route('dashboard.pages.sections.update', [$page, $section]) : route('dashboard.pages.sections.store', $page) }}"
            enctype="multipart/form-data" data-section-form
            class="flex flex-col gap-6 border border-border bg-background p-5 sm:p-8">
            @csrf
            @if ($section)
                @method('PUT')
            @endif

            <div class="grid gap-6 sm:grid-cols-2">
                <div class="flex flex-col gap-2">
                    <label for="type" class="text-sm font-medium">Jenis bagian</label>
                    <select id="type" name="type" data-section-type required
                        class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                        @foreach ($types as $type)
                            <option value="{{ $type->value }}" @selected($selectedType === $type->value)>{{ $type->label() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @if (!$section)
                    <div class="flex flex-col gap-2">
                        <label for="position" class="text-sm font-medium">Posisi</label>
                        <input id="position" name="position" type="number" min="1"
                            value="{{ old('position', $page->sections->count() + 1) }}"
                            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                        <p class="text-xs text-muted">Bagian teks dapat diletakkan sebelum atau sesudah bagian lain.</p>
                    </div>
                @endif

                <div class="flex flex-col gap-2">
                    <label for="eyebrow" class="text-sm font-medium">Keterangan kecil</label>
                    <input id="eyebrow" name="eyebrow" value="{{ old('eyebrow', $section?->eyebrow) }}"
                        class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="heading" class="text-sm font-medium">Judul</label>
                    <input id="heading" name="heading" value="{{ old('heading', $section?->heading) }}"
                        class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                </div>

                <div data-section-fields="content" class="flex flex-col gap-2 sm:col-span-2">
                    <label class="text-sm font-medium">Isi teks berformat</label>
                    <div data-quill-editor data-quill-input="#section-content-editor" class="min-h-64 border border-border">
                    </div>
                    <textarea id="section-content-editor" name="content"
                        hidden>{{ old('content', $section?->content) }}</textarea>
                </div>

                <div data-section-fields="media" class="flex flex-col gap-2">
                    <label for="image" class="text-sm font-medium">Gambar</label>
                    <input id="image" name="image" type="file" accept="image/*"
                        class="min-h-12 border border-border px-4 py-3 text-sm">
                </div>

                <div data-section-fields="media" class="flex flex-col gap-2">
                    <label for="video_url" class="text-sm font-medium">Alamat video</label>
                    <input id="video_url" name="video_url" type="url" value="{{ old('video_url', $section?->video_url) }}"
                        placeholder="Tempel alamat video YouTube"
                        class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                </div>

                <div data-section-fields="hero,secondary_hero" class="flex flex-col gap-2">
                    <label for="button_text" class="text-sm font-medium">Teks tombol</label>
                    <input id="button_text" name="button_text" value="{{ old('button_text', $section?->button_text) }}"
                        class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                </div>

                <div data-section-fields="hero,secondary_hero" class="flex flex-col gap-2">
                    <label for="button_url" class="text-sm font-medium">Alamat tombol</label>
                    <input id="button_url" name="button_url" type="url"
                        value="{{ old('button_url', $section?->button_url) }}"
                        class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                </div>

                <div class="flex flex-col gap-2">
                    <label for="background_color" class="text-sm font-medium">Warna latar</label>
                    <select id="background_color" name="background_color"
                        class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                        @foreach ($colorOptions as $value => $label)
                            <option value="{{ $value }}" @selected(old('background_color', $section?->background_color ?? 'primary') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="text_color" class="text-sm font-medium">Warna teks</label>
                    <select id="text_color" name="text_color"
                        class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                        @foreach ($colorOptions as $value => $label)
                            <option value="{{ $value }}" @selected(old('text_color', $section?->text_color ?? 'primary') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="accent_color" class="text-sm font-medium">Warna penekanan</label>
                    <select id="accent_color" name="accent_color"
                        class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
                        @foreach ($colorOptions as $value => $label)
                            <option value="{{ $value }}" @selected(old('accent_color', $section?->accent_color ?? 'primary') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="min-h-12 bg-primary px-5 text-sm font-semibold text-white hover:bg-primary/85">
                {{ $section ? 'Perbarui bagian' : 'Tambahkan bagian' }}
            </button>
        </form>
    </div>
@endsection