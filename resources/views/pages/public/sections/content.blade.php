@php($colors = $section->colorClasses())
<section class="{{ $colors['background'] }} {{ $colors['text'] }}">
    <div class="mx-auto max-w-5xl px-5 py-16 sm:px-8 sm:py-24 lg:px-12 lg:py-28">
        <div class="max-w-[72ch]">@if($section->eyebrow)
            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] {{ $colors['accent'] }}">
        {{ $section->eyebrow }}</p>@endif<h2 class="mt-4 text-4xl font-semibold tracking-[-0.06em] sm:text-5xl">
                {{ $section->heading }}</h2>
            <div class="mt-8 flex flex-col gap-5 text-lg leading-8">{!! $section->content !!}</div>
        </div>
    </div>
</section>