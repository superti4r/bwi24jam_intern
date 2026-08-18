@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    @include('components.app.page-header', ['title' => 'Kategori', 'eyebrow' => 'Kategori', 'description' => 'Atur pengelompokan artikel agar publikasi tetap mudah dijelajahi.'])

    <div class="mx-auto max-w-[90rem] px-5 py-8 sm:px-8 lg:px-12">
        <div class="mb-5 flex items-center justify-between gap-4">
            <p class="text-sm text-muted">{{ $categories->count() }} kategori</p>
            <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-muted">Kategori</span>
        </div>

        @if ($categories->isEmpty())
            <div class="border border-border bg-surface p-8">
                <h2 class="text-2xl font-semibold tracking-[-0.04em]">Belum ada kategori</h2>
                <p class="mt-3 text-sm leading-6 text-muted">Buat kategori untuk mulai mengorganisasi artikel.</p>
                <a href="{{ route('dashboard.categories.create') }}"
                    class="mt-6 inline-flex min-h-11 items-center bg-primary px-4 text-sm font-semibold text-white hover:bg-primary/85">Buat
                    kategori pertama</a>
            </div>
        @else
            @include('pages.app.categories.partials.table')
        @endif
    </div>
@endsection