@extends('layouts.home')

@section('content')
<main>
    <article>
        <header class="mx-auto max-w-6xl px-5 pb-14 pt-16 sm:px-8 sm:pb-20 sm:pt-24 lg:px-12 lg:pb-24 lg:pt-32">
            <a href="{{ route('home') }}#articles" data-motion-interaction
                class="editorial-link text-sm font-semibold text-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4">&larr;
                Kembali</a>
            <div class="mt-12">
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">{{ $article->category?->name }}</p>
                <h1
                    class="mt-5 max-w-5xl text-[clamp(2.75rem,6vw,6.5rem)] font-semibold leading-[0.96] tracking-[-0.07em]">
                    {{ $article->title }}
                </h1>
                <p class="mt-8 max-w-3xl text-lg leading-8 text-muted sm:text-xl">{{ Str::of(strip_tags($article->content))->limit(220) }}</p>
                <div class="mt-8 flex flex-wrap gap-x-4 gap-y-2 border-t border-border pt-5 text-sm text-muted">
                    <span>Oleh {{ $article->user->name }}</span><span aria-hidden="true">/</span><time>{{ $article->created_at->format('d M Y') }}</time><span aria-hidden="true">/</span><span>{{ max(1, ceil(str_word_count(strip_tags($article->content)) / 200)) }} min read</span>
                </div>
            </div>
        </header>
        <figure class="mx-auto max-w-6xl px-5 sm:px-8 lg:px-12"><img
                src="{{ $article->thumbnail ? asset('storage/'.$article->thumbnail) : 'https://picsum.photos/seed/'.$article->slug.'/1600/900' }}"
                alt="Gambar editorial untuk {{ $article->title }}" fetchpriority="high" decoding="async"
                class="aspect-[16/8] w-full object-cover"></figure>
        <div class="mx-auto max-w-6xl px-5 py-16 sm:px-8 sm:py-24 lg:px-12 lg:py-28">
            <div
                class="flex max-w-[68ch] flex-col gap-8 text-xl leading-9 text-foreground/85 sm:text-[1.3rem] sm:leading-9 lg:max-w-[72ch] lg:text-[1.45rem] lg:leading-10">
                {!! $article->content !!}
            </div>
            @php($shareUrl = request()->fullUrl())
            <div class="mt-16 border-t border-border pt-7" data-share-tools data-share-url="{{ $shareUrl }}">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-muted">Bagikan</p>
                <div class="mt-4 flex flex-wrap gap-3">
                    <button type="button" data-share-copy data-motion-interaction
                        class="inline-flex items-center gap-2 border border-primary bg-primary px-4 py-3 text-sm font-medium text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"><x-icon.copy-link
                            class="size-4" />Salin Link</button>
                    <a href="https://wa.me/?text={{ rawurlencode($article->title . ' ' . $shareUrl) }}"
                        target="_blank" rel="noopener noreferrer" data-motion-interaction
                        class="inline-flex items-center gap-2 border border-share-whatsapp bg-share-whatsapp px-4 py-3 text-sm font-medium text-white transition-colors hover:bg-share-whatsapp/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-share-whatsapp focus-visible:ring-offset-2"><x-icon.whatsapp
                            class="size-4" />WhatsApp</a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ rawurlencode($shareUrl) }}" target="_blank"
                        rel="noopener noreferrer" data-motion-interaction
                        class="inline-flex items-center gap-2 border border-share-facebook bg-share-facebook px-4 py-3 text-sm font-medium text-white transition-colors hover:bg-share-facebook/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-share-facebook focus-visible:ring-offset-2"><x-icon.facebook
                            class="size-4" />Facebook</a>
                </div>
            </div>
        </div>
    </article>
</main>
@include('components.home.footer')
@endsection
