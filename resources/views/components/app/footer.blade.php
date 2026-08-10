<footer
    class="relative w-full bg-[var(--color-surface)] border-t border-[var(--color-border)] transition-colors duration-200 mt-auto overflow-hidden">

    <div class="hidden lg:block absolute top-0 right-0 w-[45%] h-full z-0 pointer-events-none">
        <div
            class="absolute inset-0 bg-gradient-to-r from-[var(--color-surface)] via-[var(--color-surface)]/80 to-transparent z-10">
        </div>
        <img src="{{ asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp') }}" alt="Footer Decoration"
            class="w-full h-full object-cover object-center opacity-100">
    </div>

    <div class="relative z-10 max-w-screen-2xl mx-auto px-4 md:px-8 pt-12 lg:pt-16 pb-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">

            <div class="lg:col-span-2 xl:col-span-1">
                <a href="/" class="inline-block transition-transform hover:scale-105 duration-200">
                    <img src="{{ asset('images/bwi24jam_exEdQ4JEsL87D0C5O28lxjgx1H8xByAV2ocPy3Gd4aM.png') }}"
                        alt="{{ config('app.name') }}" class="h-9 w-auto object-contain">
                </a>

                <p class="mt-5 text-[14px] leading-relaxed text-[var(--color-muted-foreground)] max-w-sm">
                    Platform berita online seputar kota Banyuwangi, Jawa Timur. Menyajikan informasi terkini, akurat,
                    dan terpercaya untuk masyarakat.
                </p>

                <x-app.footer-social />
            </div>

            <div class="lg:col-span-2 xl:col-span-3">
                <h3 class="text-[13px] font-bold text-[var(--color-foreground)] uppercase tracking-wider">
                    Navigasi
                </h3>
                @php
                    $navItems = collect([
                        [
                            'label' => 'Beranda',
                            'url' => route(auth()->check() ? 'm.home' : 'home'),
                        ],
                    ]);

                    $pageItems = \App\Models\Page::query()
                        ->published()
                        ->orderBy('created_at', 'asc')
                        ->get()
                        ->map(fn ($page) => [
                            'label' => $page->title,
                            'url' => route(auth()->check() ? 'm.pages.show' : 'pages.show', $page->slug),
                        ]);

                    $navItems = $navItems->concat($pageItems)->values();
                    $navColumns = $navItems->chunk(4);
                @endphp

                <ul class="mt-5 flex flex-wrap gap-x-8 gap-y-3">
                    @foreach ($navColumns as $column)
                        <li class="flex min-w-0 flex-1 flex-col gap-3">
                            @foreach ($column as $item)
                                <a href="{{ $item['url'] }}"
                                    class="inline-block text-[14px] text-[var(--color-muted-foreground)] hover:text-[var(--color-primary)] hover:translate-x-1 transition-all duration-200">
                                    {{ $item['label'] }}
                                </a>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <div
            class="mt-12 pt-8 border-t border-[var(--color-border)] flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-[13px] text-[var(--color-muted-foreground)]">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Hak cipta dilindungi undang-undang.
            </p>
        </div>

    </div>
</footer>