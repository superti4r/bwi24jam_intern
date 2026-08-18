@php($colors = $section->colorClasses())
<section class="relative isolate overflow-hidden {{ $colors['background'] }} {{ $colors['text'] }}">
    <div class="relative z-10 mx-auto max-w-[90rem] px-5 py-20 sm:px-8 sm:py-28 lg:px-12 lg:py-36">
        <div class="max-w-3xl">@if($section->eyebrow)
            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] {{ $colors['accent'] }}">
        {{ $section->eyebrow }}</p>@endif<h1
                class="mt-5 text-[clamp(3rem,8vw,8rem)] font-semibold leading-[0.9] tracking-[-0.08em]">
                {{ $section->heading }}</h1>@if($section->content)
                <div class="prose mt-8 max-w-2xl text-lg leading-8">{!! $section->content !!}</div>@endif
            @if($section->button_url)<a href="{{ $section->button_url }}"
                class="mt-8 inline-block border-b border-current pb-1 font-semibold">{{ $section->button_text ?: 'Selengkapnya' }}
            <span aria-hidden="true">&rarr;</span></a>@endif
        </div>
    </div>@if($section->image)<img src="{{ $section->image_url }}" alt=""
    class="absolute inset-0 -z-10 size-full object-cover opacity-25">@endif
</section>