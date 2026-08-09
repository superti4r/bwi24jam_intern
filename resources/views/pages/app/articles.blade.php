@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="mx-auto max-w-4xl">
        <div class="page mt-4">
            <div class="page__header flex-col items-start gap-3">
                <div class="page__headline">
                    @if ($article->category)
                        <span
                            class="inline-flex w-fit items-center rounded-full bg-[var(--color-primary)] px-3 py-1 text-[11px] font-semibold uppercase tracking-wider text-[var(--color-primary-foreground)]">
                            {{ $article->category->name }}
                        </span>
                    @endif

                    <h1 class="mt-3 text-2xl font-bold leading-tight sm:text-3xl lg:text-4xl">
                        {{ $article->title }}
                    </h1>

                    <div class="mt-4 flex flex-wrap items-center gap-x-3 gap-y-2 text-sm">
                        <span class="font-medium">{{ $article->user?->name }}</span>
                        <span class="text-[var(--color-muted-foreground)]" aria-hidden="true">&middot;</span>
                        <time class="text-[var(--color-muted-foreground)]">
                            {{ $article->created_at->translatedFormat('d F Y') }}
                        </time>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            @if ($article->thumbnail)
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                    class="w-full rounded-lg object-cover" style="aspect-ratio: 16 / 9;">
            @else
                <div class="flex w-full items-center justify-center rounded-lg bg-[var(--color-surface-2)]"
                    style="aspect-ratio: 16 / 9;">
                    <x-icons.info class="h-12 w-12 text-[var(--color-muted-foreground)]" />
                </div>
            @endif
        </div>

        <div class="mt-6">
            <div class="ql-editor p-0 text-base leading-relaxed" style="min-height: auto;">
                {!! $article->content !!}
            </div>
        </div>
    </div>
@endsection