<section id="articles" class="mx-auto max-w-[90rem] px-5 py-20 sm:px-8 sm:py-28 lg:px-12 lg:py-36">
    <div
        class="mb-10 flex flex-col gap-6 border-b border-border pb-7 sm:mb-14 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-primary">Eksplorasi</p>
            <h2 class="mt-3 text-3xl font-semibold tracking-[-0.05em] sm:text-4xl">Artikel</h2>
        </div>
        <form action="{{ route('search.articles') }}" method="get" role="search" data-search-form
            class="flex w-full max-w-md border border-border bg-background focus-within:border-primary"><label
                for="article-search" class="sr-only">Cari artikel</label><input id="article-search" name="q"
                type="search" placeholder="Cari artikel"
                class="w-0 min-w-0 flex-1 bg-transparent px-4 py-3 text-sm text-foreground outline-none placeholder:text-muted/75"><button
                type="button" data-search-clear data-motion-interaction aria-label="Clear search" title="Clear search"
                class="hidden shrink-0 items-center justify-center px-3 text-primary transition-colors hover:text-primary/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset"><x-icon.close
                    class="size-4" /></button><button type="submit" data-motion-interaction
                class="shrink-0 border-l border-primary bg-primary px-4 py-3 text-sm font-medium text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset">Cari</button>
        </form>
    </div>
    @if ($articles->isEmpty())
        <div class="border border-border bg-surface p-6 sm:p-8">
            <h3 class="text-2xl font-semibold tracking-[-0.04em]">Belum ada artikel.</h3>
            <p class="mt-3 text-sm leading-6 text-muted">Artikel yang sudah diterbitkan akan tampil di sini.</p>
        </div>
    @else
        <div class="flex flex-col gap-4">@foreach ($articles as $article)
            <article
                class="group flex flex-col border border-border bg-background transition-colors hover:border-primary/60 lg:grid lg:grid-cols-[minmax(16rem,0.32fr)_minmax(0,1fr)]">
                <a href="{{ route('articles.show', ['slug' => $article->slug]) }}"
                    class="image-frame block aspect-[16/9] shrink-0 border-b border-border lg:aspect-auto lg:min-h-[18rem] lg:border-b-0 lg:border-r focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset"
                    aria-label="Baca {{ $article->title }}"><img
                        src="{{ $article->thumbnail ? asset('storage/' . $article->thumbnail) : 'https://picsum.photos/seed/' . $article->slug . '/1000/700' }}"
                        alt="Gambar editorial untuk {{ $article->title }}" loading="lazy" decoding="async"></a>
                <div class="flex flex-1 flex-col p-5 sm:p-7 lg:justify-center lg:p-10">
                    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-primary">
                        {{ $article->category?->name }}</p>
                    <h3
                        class="mt-4 max-w-3xl text-xl font-semibold leading-tight tracking-[-0.04em] sm:text-2xl lg:text-3xl">
                        <a href="{{ route('articles.show', ['slug' => $article->slug]) }}"
                            class="transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">{{ $article->title }}</a>
                    </h3>
                    <p class="mt-3 max-w-2xl line-clamp-3 text-sm leading-6 text-muted">
                        {{ Str::of(strip_tags($article->content))->limit(220) }}</p>
                    <div class="mt-6 flex flex-wrap gap-x-3 gap-y-1 text-xs text-muted">
                        <time>{{ $article->created_at->format('d M Y') }}</time><span
                            aria-hidden="true">/</span><span>{{ max(1, ceil(str_word_count(strip_tags($article->content)) / 200)) }}
                            min read</span></div>
                </div>
        </article>@endforeach
        </div>
    @endif
</section>