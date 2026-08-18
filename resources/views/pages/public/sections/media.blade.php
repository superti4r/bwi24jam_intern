@php($colors = $section->colorClasses())
<section class="relative isolate min-h-[28rem] overflow-hidden {{ $colors['background'] }} {{ $colors['text'] }}">
    @if($section->image)<img src="{{ $section->image_url }}" alt=""
    class="absolute inset-0 -z-10 size-full object-cover opacity-45">@elseif($section->video_embed_url)
            <div class="absolute inset-0 -z-10"><iframe src="{{ $section->video_embed_url }}" title="{{ $section->heading }}"
                    class="video-cover-frame" loading="lazy" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
        @endif<div
        class="relative z-10 mx-auto flex min-h-[28rem] max-w-[90rem] items-end px-5 py-14 sm:px-8 sm:py-20 lg:px-12 lg:py-24">
        <div class="max-w-xl">@if($section->eyebrow)
            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] {{ $colors['accent'] }}">
        {{ $section->eyebrow }}</p>@endif<h2
                class="mt-4 text-4xl font-semibold leading-none tracking-[-0.06em] sm:text-6xl">{{ $section->heading }}
            </h2>@if($section->content)
            <div class="mt-6 text-lg leading-8 opacity-80">{!! $section->content !!}</div>@endif
        </div>
    </div>
</section>