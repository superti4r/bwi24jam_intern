@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    @include('components.app.page-header', [
        'title' => 'Edit Kategori',
        'eyebrow' => 'Kategori',
        'description' => 'Perbarui nama tanpa mengubah slug publik kategori.',
    ])

    <div class="mx-auto max-w-2xl px-5 py-8 sm:px-8 lg:px-12">
        <form method="POST" action="{{ route('dashboard.categories.update', $category) }}"
            class="border border-border bg-background p-5 sm:p-8">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-2">
                <label for="name" class="text-sm font-medium">Nama kategori</label>
                <input id="name" name="name" value="{{ old('name', $category->name) }}" required
                    class="min-h-12 border border-border px-4 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            </div>
            <p class="mt-5 border-l-2 border-primary bg-surface px-4 py-3 text-xs leading-5 text-muted">Slug tetap: <span
                    class="font-mono text-foreground">{{ $category->slug }}</span></p>
            <button type="submit"
                class="mt-8 min-h-12 bg-primary px-5 text-sm font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Perbarui
                kategori</button>
        </form>
    </div>
@endsection