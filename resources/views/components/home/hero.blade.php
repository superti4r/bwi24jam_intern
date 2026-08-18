<section class="relative isolate overflow-hidden">
    <img src="{{ $websiteInformation->hero_image_url }}" alt="" aria-hidden="true" class="hero-art">
    <div
        class="pointer-events-none absolute inset-0 bg-gradient-to-r from-background/95 via-background/75 to-background/15 sm:via-background/70">
    </div>
    <div
        class="relative z-10 mx-auto max-w-[90rem] px-5 pb-16 pt-12 sm:px-8 sm:pb-20 sm:pt-16 lg:px-12 lg:pb-24 lg:pt-20">
        <div class="grid items-center gap-8 sm:gap-12 lg:grid-cols-[minmax(0,1.35fr)_minmax(18rem,0.65fr)] lg:gap-20">
            <div>
                <h1 class="max-w-4xl">
                    <img src="/images/bwi24jam_image.png" alt="BWI 24 Jam"
                        class="block h-auto w-full max-w-[11rem] object-contain object-left sm:max-w-[15rem] lg:max-w-[19rem]">
                </h1>
            </div>
            <div class="max-w-md lg:justify-self-end">
                <p class="max-w-md text-lg leading-8 text-muted sm:text-xl sm:leading-9">
                    {{ $websiteInformation->hero_description }}
                </p>
                <a href="#latest" data-motion-interaction
                    class="editorial-link mt-8 inline-block min-h-11 py-2 text-base font-semibold text-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4">Jelajahi
                    <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </div>
</section>