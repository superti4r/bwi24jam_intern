@props(['articles' => collect()])

<div class="w-full">
    @if ($articles->isEmpty())
        <div class="card w-full">
            <div class="card__body flex flex-col items-center justify-center gap-2 py-12 text-center">
                <span class="icon-box icon-box--neutral icon-box--circle mb-2"
                    style="--icon-box-size: 3rem; --icon-box-icon-size: 1.25rem;">
                    <x-icons.info />
                </span>
                <h3 class="card__title m-0">Belum Ada Artikel</h3>
                <p class="m-0 text-sm text-[var(--color-muted-foreground)]">
                    Artikel utama belum tersedia. Nantikan artikel terbaru kami.
                </p>
            </div>
        </div>
    @else
        @php
            $latest = $articles->values();
            $total = $latest->count();
        @endphp

        <div class="carousel" data-stisla-carousel tabindex="0" role="region" aria-label="Artikel utama"
            style="--carousel-aspect-ratio: 16 / 9;">

            <div class="carousel__viewport">
                <div class="carousel__track">
                    @foreach ($latest as $index => $article)
                        <div class="carousel__slide" role="group" aria-label="{{ $index + 1 }} of {{ $total }}">
                            <a href="#" class="block h-full w-full group">
                                @if ($article->thumbnail)
                                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                @else
                                    <div class="h-full w-full bg-[var(--color-surface-2)] flex items-center justify-center">
                                        <x-icons.info class="w-10 h-10 text-[var(--color-muted-foreground)]" />
                                    </div>
                                @endif
                                <div class="carousel__caption flex flex-col justify-end gap-1 p-4 sm:p-6 lg:p-8">
                                    <span
                                        class="inline-flex w-fit items-center rounded-full bg-[var(--color-primary)] px-2.5 py-0.5 text-[11px] font-semibold text-[var(--color-primary-foreground)] uppercase tracking-wider">
                                        {{ $article->category?->name }}
                                    </span>
                                    <h2
                                        class="mt-2 text-lg sm:text-2xl lg:text-3xl font-bold leading-snug text-[var(--color-overlay-foreground)] group-hover:underline">
                                        {{ $article->title }}
                                    </h2>
                                    <p
                                        class="mt-1 hidden text-sm leading-relaxed text-[var(--color-overlay-foreground)]/80 sm:block">
                                        {{ Str::limit(strip_tags($article->content), 160) }}
                                    </p>
                                    <p class="mt-1 text-xs font-medium text-[var(--color-overlay-foreground)]/70">
                                        {{ $article->user?->name }} &middot;
                                        {{ $article->created_at->translatedFormat('d M Y') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <button class="carousel__control carousel__control--prev" type="button" aria-label="Sebelumnya">
                <x-icons.chevron-left />
            </button>
            <button class="carousel__control carousel__control--next" type="button" aria-label="Selanjutnya">
                <x-icons.chevron-right />
            </button>

            <ul class="carousel__indicators">
                @foreach ($latest as $index => $article)
                    <li>
                        <button class="carousel__indicator" type="button" aria-label="Slide {{ $index + 1 }}"></button>
                    </li>
                @endforeach
            </ul>

        </div>
    @endif
</div>