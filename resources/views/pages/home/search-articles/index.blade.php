@extends('layouts.home')

@section('content')
    <main>
        <section class="mx-auto max-w-[90rem] px-5 pb-16 pt-20 sm:px-8 sm:pb-20 sm:pt-28 lg:px-12 lg:pt-36">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">Hasil Pencarian</p>
            <h1 class="mt-5 max-w-4xl text-5xl font-semibold leading-[0.98] tracking-[-0.07em] sm:text-6xl lg:text-8xl">
                Cari artikel</h1>
            <form action="{{ route('search.articles') }}" method="get" role="search" data-search-form
                class="mt-10 flex w-full max-w-2xl border border-border bg-background focus-within:border-primary">
                <label for="article-search-results" class="sr-only">Cari artikel</label>
                <input id="article-search-results" name="q" type="search" value="{{ $query }}"
                    placeholder="Cari berdasarkan judul, topik, atau ide"
                    class="w-0 min-w-0 flex-1 bg-transparent px-4 py-3 text-sm text-foreground outline-none placeholder:text-muted/75 sm:px-5">
                <button type="button" data-search-clear data-motion-interaction aria-label="Bersihkan pencarian"
                    title="Bersihkan pencarian"
                    class="hidden shrink-0 items-center justify-center px-3 text-primary transition-colors hover:text-primary/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset"><x-icon.close
                        class="size-4" /></button>
                <button type="submit" data-motion-interaction
                    class="shrink-0 border-l border-primary bg-primary px-4 py-3 text-sm font-medium text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset">Cari</button>
            </form>
        </section>
        <section class="border-y border-border bg-surface">
            <div class="mx-auto max-w-[90rem] px-5 py-12 sm:px-8 sm:py-16 lg:px-12">
                @if ($query === '')
                    <p class="text-sm text-muted">Masukkan istilah pencarian untuk menemukan artikel.</p>
                @elseif ($articles->isEmpty())
                    <div class="border border-border bg-background p-6 sm:p-8">
                        <h2 class="text-2xl font-semibold tracking-[-0.04em]">Artikel tidak ditemukan</h2>
                        <p class="mt-3 text-sm leading-6 text-muted">Coba gunakan istilah pencarian yang lebih luas atau
                            jelajahi koleksi lengkap.
                        </p><a href="{{ route('home') }}#articles" data-motion-interaction
                            class="editorial-link mt-6 inline-block text-sm font-semibold text-foreground">Jelajahi artikel
                            <span aria-hidden="true">&rarr;</span></a>
                    </div>
                @else
                    <p class="mb-8 text-sm text-muted">{{ $articles->count() }} hasil untuk
                        <span class="font-medium text-foreground">{{ $query }}</span>
                    </p>
                    <div class="flex flex-col gap-4">@foreach ($articles as $article)
                    @include('pages.home.articles.partials.card', ['article' => $article]) @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>
    @include('components.home.footer')
@endsection
