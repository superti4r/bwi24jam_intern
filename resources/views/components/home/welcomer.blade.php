<section
    class="relative isolate min-h-[30rem] overflow-hidden bg-foreground text-white sm:min-h-[34rem] lg:min-h-[38rem]">
    <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
        <iframe class="video-cover-frame" src="{{ $websiteInformation->welcomer_video_embed_url }}" title=""
            loading="lazy" tabindex="-1" allow="autoplay; encrypted-media" allowfullscreen
            referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>
    <div
        class="pointer-events-none absolute inset-0 bg-gradient-to-r from-foreground/90 via-foreground/60 to-foreground/20 sm:via-foreground/55">
    </div>
    <div
        class="pointer-events-none absolute inset-0 bg-gradient-to-t from-foreground/75 via-transparent to-foreground/15">
    </div>

    <div data-motion-interaction
        class="relative z-10 mx-auto flex min-h-[30rem] max-w-[90rem] items-end px-5 py-14 sm:min-h-[34rem] sm:px-8 sm:py-20 lg:min-h-[38rem] lg:items-center lg:px-12 lg:py-24">
        <div class="max-w-xl">
            <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-white/65">
                {{ $websiteInformation->welcomer_eyebrow }}</p>
            <h2 class="mt-5 max-w-lg text-[clamp(2.5rem,6vw,5.5rem)] font-semibold leading-[0.98] tracking-[-0.07em]">
                {{ $websiteInformation->welcomer_title }}</h2>
            <p class="mt-6 max-w-md text-base leading-7 text-white/75 sm:text-lg sm:leading-8">
                {{ $websiteInformation->welcomer_description }}</p>
            <div
                class="mt-8 flex items-center gap-4 text-[10px] font-semibold uppercase tracking-[0.2em] text-white/55 sm:mt-10">
                <span class="h-px w-10 bg-primary"></span><span>{{ $websiteInformation->welcomer_label }}</span></div>
        </div>
    </div>
</section>