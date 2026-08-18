@if ($latestArticle)
    <section id="latest" class="bg-primary text-white">
        <div class="grid lg:grid-cols-[minmax(0,1.15fr)_minmax(25rem,0.85fr)]">
            <div class="relative min-h-[24rem] overflow-hidden sm:min-h-[32rem] lg:min-h-[42rem]"><img
                    src="{{ $latestArticle->thumbnail ? asset('storage/' . $latestArticle->thumbnail) : 'https://picsum.photos/seed/' . $latestArticle->slug . '/1600/1200' }}"
                    alt="Editorial image for {{ $latestArticle->title }}" fetchpriority="high" decoding="async"
                    class="article-feature-image transition-transform duration-500 hover:scale-[1.015] motion-reduce:transition-none motion-reduce:hover:transform-none">
                <div
                    class="pointer-events-none absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-primary/95 lg:bg-gradient-to-r lg:from-transparent lg:via-primary/15 lg:to-primary">
                </div>
            </div>
            <article
                class="relative z-10 flex flex-col justify-center px-5 py-14 sm:px-8 sm:py-20 lg:-ml-8 lg:bg-primary lg:px-16 lg:py-24">
                <p class="mb-8 text-xs font-semibold uppercase tracking-[0.18em] text-white/70">Artikel Terbaru /
                    {{ $latestArticle->category?->name }}
                </p>
                <h2 class="max-w-xl text-4xl font-semibold leading-[1.02] tracking-[-0.06em] sm:text-5xl lg:text-6xl">
                    {{ $latestArticle->title }}
                </h2>
                <p class="mt-7 max-w-lg text-base leading-7 text-white/75">
                    {{ Str::of(strip_tags($latestArticle->content))->limit(220) }}
                </p>
                <div
                    class="mt-10 flex flex-wrap items-center gap-x-5 gap-y-2 border-t border-white/25 pt-5 text-xs text-white/65">
                    <span>Oleh {{ $latestArticle->user->name }}</span><span
                        aria-hidden="true">/</span><time>{{ $latestArticle->created_at->format('d M Y') }}</time><span
                        aria-hidden="true">/</span><span>{{ max(1, ceil(str_word_count(strip_tags($latestArticle->content)) / 200)) }}
                        min read</span>
                </div>
                <a href="{{ route('articles.show', ['slug' => $latestArticle->slug]) }}" data-motion-interaction
                    class="mt-8 w-fit border-b border-white/60 pb-1 text-sm font-semibold text-white transition-colors hover:border-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-4 focus-visible:ring-offset-primary">Baca
                    artikel <span aria-hidden="true">&rarr;</span></a>
            </article>
        </div>
    </section>
@else
    <section id="latest" class="bg-primary px-5 py-20 text-white sm:px-8 lg:px-12">
        <div class="mx-auto max-w-[90rem]">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/70">Artikel Terbaru</p>
            <h2 class="mt-4 max-w-2xl text-4xl font-semibold tracking-[-0.06em] sm:text-5xl">Belum ada artikel yang
                diterbitkan.</h2>
        </div>
    </section>
@endif