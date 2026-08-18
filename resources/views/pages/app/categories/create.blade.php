@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    @include('components.app.page-header', [
        'title' => 'Tambah Kategori',
        'eyebrow' => 'Kategori',
        'description' => 'Buat pengelompokan baru untuk artikel Anda.',
    ])

    <div class="mx-auto max-w-2xl px-5 py-8 sm:px-8 lg:px-12">
        <form method="POST" action="{{ route('dashboard.categories.store') }}"
            class="border border-border bg-background p-5 sm:p-8">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="name" class="text-sm font-medium">Nama kategori</label>
                <input id="name" name="name" value="{{ old('name') }}" required
                    class="min-h-12 border border-border px-4 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <p class="mt-3 text-xs leading-5 text-muted">Slug akan dibuat otomatis dan tidak berubah setelah kategori
                dibuat.</p>
            <button type="submit"
                class="mt-8 min-h-12 bg-primary px-5 text-sm font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Simpan
                kategori</button>
        </form>
    </div>
@endsection