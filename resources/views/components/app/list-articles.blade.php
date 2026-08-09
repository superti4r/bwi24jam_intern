@props(['articles' => null])

@php
    $paginator = $articles instanceof \Illuminate\Contracts\Pagination\Paginator || $articles instanceof \Illuminate\Pagination\LengthAwarePaginator
        ? $articles
        : null;

    $items = collect($paginator ? $paginator->items() : $articles);
    $featured = $items->take(2);
    $rest = $items->skip(2);
@endphp

<div class="w-full">
    @if ($items->isEmpty())
        <div class="card w-full">
            <div class="card__body flex flex-col items-center justify-center gap-2 py-12 text-center">
                <span class="icon-box icon-box--neutral icon-box--circle mb-2"
                    style="--icon-box-size: 3rem; --icon-box-icon-size: 1.25rem;">
                    <x-icons.info />
                </span>
                <h3 class="card__title m-0">Belum Ada Artikel Lainnya</h3>
                <p class="m-0 text-sm text-[var(--color-muted-foreground)]">
                    Artikel lainnya belum tersedia. Nantikan artikel terbaru kami.
                </p>
            </div>
        </div>
    @else
        <div class="space-y-10">
            @if ($featured->isNotEmpty())
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
                    @foreach ($featured as $article)
                        <a href="#" class="card group overflow-hidden">
                            @if ($article->thumbnail)
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="card__image"
                                    style="aspect-ratio: 4 / 3;">
                            @else
                                <div class="card__image flex items-center justify-center bg-[var(--color-surface-2)]"
                                    style="aspect-ratio: 4 / 3;">
                                    <x-icons.info class="w-8 h-8 text-[var(--color-muted-foreground)]" />
                                </div>
                            @endif
                            <div class="card__overlay flex flex-col justify-end gap-1 p-4 sm:p-6"
                                style="background: linear-gradient(to top, color-mix(in oklch, var(--color-overlay) 80%, transparent), color-mix(in oklch, var(--color-overlay) 35%, transparent), transparent);">
                                <span
                                    class="inline-flex w-fit items-center rounded-full bg-[var(--color-primary)] px-2.5 py-0.5 text-[11px] font-semibold text-[var(--color-primary-foreground)] uppercase tracking-wider">
                                    {{ $article->category?->name }}
                                </span>
                                <h3
                                    class="mt-2 text-lg sm:text-xl font-bold leading-snug text-[var(--color-overlay-foreground)] group-hover:underline">
                                    {{ $article->title }}
                                </h3>
                                <p class="mt-1 text-sm leading-relaxed text-[var(--color-overlay-foreground)]/80">
                                    {{ Str::limit(strip_tags($article->content), 140) }}
                                </p>
                                <p class="mt-1 text-xs font-medium text-[var(--color-overlay-foreground)]/70">
                                    {{ $article->user?->name }} &middot;
                                    {{ $article->created_at->translatedFormat('d M Y') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

            @if ($rest->isNotEmpty())
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
                    @foreach ($rest as $article)
                        <a href="#" class="card group overflow-hidden">
                            @if ($article->thumbnail)
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="card__image"
                                    style="aspect-ratio: 4 / 3;">
                            @else
                                <div class="card__image flex items-center justify-center bg-[var(--color-surface-2)]"
                                    style="aspect-ratio: 4 / 3;">
                                    <x-icons.info class="w-6 h-6 text-[var(--color-muted-foreground)]" />
                                </div>
                            @endif
                            <div class="card__overlay flex flex-col justify-end gap-1 p-4"
                                style="background: linear-gradient(to top, color-mix(in oklch, var(--color-overlay) 80%, transparent), color-mix(in oklch, var(--color-overlay) 35%, transparent), transparent);">
                                <span
                                    class="inline-flex w-fit items-center rounded-full bg-[var(--color-primary)] px-2.5 py-0.5 text-[11px] font-semibold text-[var(--color-primary-foreground)] uppercase tracking-wider">
                                    {{ $article->category?->name }}
                                </span>
                                <h4
                                    class="mt-2 text-base font-bold leading-snug text-[var(--color-overlay-foreground)] group-hover:underline">
                                    {{ $article->title }}
                                </h4>
                                <p class="mt-1 text-xs font-medium text-[var(--color-overlay-foreground)]/70">
                                    {{ $article->user?->name }} &middot;
                                    {{ $article->created_at->translatedFormat('d M Y') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        @if ($paginator && $paginator->hasPages())
            <div class="mt-10 flex justify-end">
                {{ $paginator->links() }}
            </div>
        @endif
    @endif
</div>
