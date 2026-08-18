@extends('layouts.app')

@section('title', 'Halaman')

@section('content')
    @include('components.app.page-header', ['title' => 'Halaman', 'eyebrow' => 'Penyusun halaman', 'description' => 'Susun halaman publik dengan bagian yang dapat diatur urutannya.'])
    <div class="mx-auto max-w-[90rem] px-5 py-8 sm:px-8 lg:px-12">
        @if (session('status'))
            <p class="mb-6 border-l-2 border-primary bg-surface px-4 py-3 text-sm" role="status">{{ session('status') }}</p>
        @endif
        <div class="mb-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-muted">{{ $pages->total() }} halaman tersedia</p>
            <a href="{{ route('dashboard.pages.create') }}"
                class="inline-flex min-h-11 items-center justify-center bg-primary px-4 text-sm font-semibold text-white hover:bg-primary/85">Buat
                halaman</a>
        </div>
        <div class="flex flex-col border-t border-border">
            @forelse ($pages as $page)
                <div class="grid gap-4 border-b border-border py-6 sm:grid-cols-[minmax(0,1fr)_auto] sm:items-center sm:px-4">
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-primary">
                            {{ $page->status->value === 'published' ? 'Diterbitkan' : 'Draf' }}</p>
                        <h2 class="mt-2 text-xl font-semibold tracking-[-0.04em]">{{ $page->title }}</h2>
                        <p class="mt-1 text-sm text-muted">/{{ $page->slug }}</p>
                    </div>
                    <div class="flex flex-wrap gap-3"><a href="{{ route('dashboard.pages.edit', $page) }}"
                            class="font-semibold text-primary underline underline-offset-4">Kelola</a>@if($page->status->value === 'published')<a
                                href="{{ route('pages.show', $page->slug) }}" target="_blank"
                            class="font-semibold text-muted underline underline-offset-4">Lihat halaman</a>@endif</div>
                </div>
            @empty
                <div class="border border-border bg-surface p-8">
                    <h2 class="text-2xl font-semibold">Belum ada halaman</h2>
                    <p class="mt-3 text-sm text-muted">Buat halaman pertama untuk mulai menyusun konten publik.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-6">{{ $pages->onEachSide(1)->links() }}</div>
    </div>
@endsection