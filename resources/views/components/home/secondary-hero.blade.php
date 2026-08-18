<section class="bg-primary text-white">
    <div
        class="mx-auto grid max-w-[90rem] gap-12 px-5 py-20 sm:px-8 sm:py-28 lg:grid-cols-[1fr_0.7fr] lg:items-end lg:px-12 lg:py-32">
        <h2 class="max-w-3xl text-4xl font-semibold leading-[1] tracking-[-0.06em] sm:text-5xl lg:text-6xl">
            {{ $websiteInformation->secondary_hero_title }}
        </h2>
        <div class="max-w-sm lg:justify-self-end">
            <p class="text-base leading-7 text-white/75">{{ $websiteInformation->secondary_hero_description }}</p>
            <a href="mailto:{{ $websiteInformation->contact_email }}" data-motion-interaction
                class="mt-8 inline-block border-b border-white/60 pb-1 text-sm font-semibold transition-colors hover:border-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-4 focus-visible:ring-offset-primary">Sampaikan
                ke mimin ya Fren! <span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
</section>