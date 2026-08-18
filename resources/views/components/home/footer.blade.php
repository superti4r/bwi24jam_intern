<footer id="about" class="relative isolate overflow-hidden bg-foreground text-white">
    <img src="{{ $websiteInformation->hero_image_url }}" alt="A large public sculpture displayed in an open civic space"
        loading="lazy" decoding="async" class="footer-art">
    <div class="absolute inset-0 -z-10 bg-foreground/55"></div>

    <div
        class="relative mx-auto grid max-w-[90rem] gap-12 px-5 py-16 sm:px-8 sm:py-20 lg:grid-cols-[minmax(14rem,0.7fr)_minmax(0,1.3fr)] lg:gap-20 lg:px-12 lg:py-24">
        <div class="max-w-xs">
            <a href="{{ route('home') }}"
                class="inline-flex focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-4 focus-visible:ring-offset-foreground"
                aria-label="Field Notes home">
                <img src="{{ asset('images/bwi24jam_image_long.png') }}" alt="BWI 24 Jam"
                    class="h-auto w-full max-w-[15rem] object-contain object-left sm:max-w-[20rem]">
            </a>
            <p
                class="mt-6 max-w-sm border-l border-primary pl-4 text-lg leading-8 tracking-[-0.015em] text-white/75 sm:text-xl sm:leading-8 lg:max-w-md lg:text-[1.35rem] lg:leading-9">
                Kekuatan Jaringan Informasi Terbuka untuk Seluruh Masyarakat Banyuwangi.</p>
        </div>

        <div class="flex flex-col justify-between gap-16 lg:py-2">
            <div class="grid grid-cols-2 gap-x-10 gap-y-12 sm:gap-10">
                <div>
                    <h2 class="text-xs font-semibold uppercase tracking-[0.16em] text-white/50">Eksplorasi</h2>
                    <div class="mt-5 flex flex-col gap-3 text-sm text-white/75">
                        <a href="{{ route('home') }}" class="transition-colors hover:text-white">Beranda</a>
                        @foreach ($publishedPages as $page)
                            <a href="{{ route('pages.show', $page->slug) }}"
                                class="transition-colors hover:text-white">{{ $page->title }}</a>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h2 class="text-xs font-semibold uppercase tracking-[0.16em] text-white/50">Sosial Media</h2>
                    <div class="mt-5 flex flex-col gap-3 text-sm text-white/75">
                        @foreach ([
                                'facebook_url' => 'Facebook',
                                'instagram_url' => 'Instagram',
                                'x_url' => 'X',
                                'youtube_url' => 'YouTube',
                            ] as $field => $label)
                            @if ($websiteInformation->{$field})
                                <a href="{{ $websiteInformation->{$field} }}" target="_blank" rel="noopener noreferrer"
                                    class="transition-colors hover:text-white">{{ $label }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col gap-3 border-t border-white/15 pt-6 text-xs text-white/45 sm:flex-row sm:items-center sm:justify-between">
                <span>&copy; {{ date('Y') }} {{ config('app.name') }}</span><span>@superti4r</span>
            </div>
        </div>
    </div>
</footer>