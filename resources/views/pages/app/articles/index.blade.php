@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
    @include('components.app.page-header', ['title' => 'Artikel', 'eyebrow' => 'Konten', 'description' => 'Kelola tulisan, status publikasi, dan artikel yang Anda miliki.'])

    <div class="mx-auto max-w-[90rem] px-5 py-8 sm:px-8 lg:px-12">
        @if (session('status'))
            <p class="mb-6 border-l-2 border-primary bg-surface px-4 py-3 text-sm" role="status">{{ session('status') }}</p>
        @endif

        <div class="mb-5 flex items-center justify-between gap-4">
            <p class="text-sm text-muted">{{ $articles->count() }} artikel tersimpan</p>
            <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-muted">Daftar konten</span>
        </div>

        @if ($articles->isEmpty())
            <div class="border border-border bg-surface p-8">
                <h2 class="text-2xl font-semibold tracking-[-0.04em]">Belum ada artikel</h2>
                <p class="mt-3 text-sm leading-6 text-muted">Mulai dengan menulis artikel pertama Anda.</p>
                <a href="{{ route('dashboard.articles.create') }}"
                    class="mt-6 inline-flex min-h-11 items-center bg-primary px-4 text-sm font-semibold text-white hover:bg-primary/85">Buat
                    artikel pertama</a>
            </div>
        @else
            @include('pages.app.articles.partials.table')
        @endif
    </div>
@endsection