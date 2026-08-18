@php($colors = $section->colorClasses())
<section class="{{ $colors['background'] }} {{ $colors['text'] }}">
    <div class="mx-auto max-w-[90rem] px-5 py-20 sm:px-8 sm:py-28 lg:px-12 lg:py-32">
        <div class="max-w-4xl">@if($section->eyebrow)
            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] {{ $colors['accent'] }}">
        {{ $section->eyebrow }}</p>@endif<h2
                class="mt-4 text-4xl font-semibold leading-none tracking-[-0.06em] sm:text-6xl">{{ $section->heading }}
            </h2>@if($section->content)
            <div class="mt-6 max-w-2xl text-lg leading-8 opacity-80">{!! $section->content !!}</div>@endif
            @if($section->button_url)<a href="{{ $section->button_url }}"
                class="mt-8 inline-block border-b border-current pb-1 font-semibold">{{ $section->button_text ?: 'Selengkapnya' }}
            &rarr;</a>@endif
        </div>
    </div>
</section>