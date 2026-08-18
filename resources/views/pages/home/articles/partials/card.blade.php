<article class="group flex flex-col border border-border bg-background transition-colors hover:border-primary/60 lg:grid lg:grid-cols-[minmax(16rem,0.32fr)_minmax(0,1fr)]">
    <a href="{{ route('articles.show', ['slug' => $article->slug]) }}" data-motion-interaction class="image-frame block aspect-[16/9] shrink-0 border-b border-border lg:aspect-auto lg:min-h-[18rem] lg:border-b-0 lg:border-r focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-inset" aria-label="Baca {{ $article->title }}">
        <img src="{{ $article->thumbnail ? asset('storage/'.$article->thumbnail) : 'https://picsum.photos/seed/'.$article->slug.'/1000/700' }}" alt="Gambar editorial untuk {{ $article->title }}" loading="lazy" decoding="async">
    </a>
    <div class="flex flex-1 flex-col p-5 sm:p-7 lg:justify-center lg:p-10">
        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-primary">{{ $article->category?->name }}</p>
        <h2 class="mt-4 max-w-3xl text-xl font-semibold leading-tight tracking-[-0.04em] sm:text-2xl lg:text-3xl"><a href="{{ route('articles.show', ['slug' => $article->slug]) }}" data-motion-interaction class="transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">{{ $article->title }}</a></h2>
        <p class="mt-3 max-w-2xl line-clamp-3 text-sm leading-6 text-muted">{{ \Illuminate\Support\Str::of(strip_tags($article->content))->limit(220) }}</p>
        <div class="mt-6 flex flex-wrap gap-x-3 gap-y-1 text-xs text-muted"><time>{{ $article->created_at->format('d M Y') }}</time><span aria-hidden="true">/</span><span>{{ max(1, ceil(str_word_count(strip_tags($article->content)) / 200)) }} min read</span></div>
    </div>
</article>
