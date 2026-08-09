<div class="w-full">
    @php
        $primaryArticles = [
            [
                'title' => 'Perubahan Cuaca Ekstrem Terjang Banyuwangi, Warga Diimbau Waspada',
                'excerpt' => 'Hujan deras disertai angin kencang melanda sejumlah kecamatan di Banyuwangi sepanjang akhir pekan.',
                'author' => 'Andi Pratama',
                'date' => '5 jam lalu',
                'category' => 'Daerah',
                'image' => asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp'),
                'url' => '#',
            ],
            [
                'title' => 'Festival Kite Internasional Digelar Kembali di Pantai Boom',
                'excerpt' => 'Ribuan peserta dari berbagai negara siap memeriahkan festival layang-layang terbesar di Jawa Timur.',
                'author' => 'Rina Wulandari',
                'date' => '2 jam lalu',
                'category' => 'Event',
                'image' => asset('images/bwi24jam_exEdQ4JEsL87D0C5O28lxjgx1H8xByAV2ocPy3Gd4aM.png'),
                'url' => '#',
            ],
            [
                'title' => 'UMKM Banyuwangi Naik Kelas Berkat Digitalisasi Pemasaran',
                'excerpt' => 'Pemerintah daerah terus mendorong pelaku usaha kecil mengadopsi teknologi untuk memperluas pasar.',
                'author' => 'Budi Santoso',
                'date' => '8 jam lalu',
                'category' => 'Ekonomi',
                'image' => asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp'),
                'url' => '#',
            ],
        ];
        $total = count($primaryArticles);
    @endphp

    <div class="carousel" data-stisla-carousel tabindex="0" role="region" aria-label="Artikel utama"
        style="--carousel-aspect-ratio: 16 / 9;">

        <div class="carousel__viewport">
            <div class="carousel__track">
                @foreach ($primaryArticles as $index => $article)
                    <div class="carousel__slide" role="group" aria-label="{{ $index + 1 }} of {{ $total }}">
                        <a href="{{ $article['url'] }}" class="block h-full w-full group">
                            <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="carousel__caption flex flex-col justify-end gap-1 p-4 sm:p-6 lg:p-8">
                                <span
                                    class="inline-flex w-fit items-center rounded-full bg-[var(--color-primary)] px-2.5 py-0.5 text-[11px] font-semibold text-[var(--color-primary-foreground)] uppercase tracking-wider">
                                    {{ $article['category'] }}
                                </span>
                                <h2
                                    class="mt-2 text-lg sm:text-2xl lg:text-3xl font-bold leading-snug text-[var(--color-overlay-foreground)] group-hover:underline">
                                    {{ $article['title'] }}
                                </h2>
                                <p class="mt-1 hidden text-sm leading-relaxed text-[var(--color-overlay-foreground)]/80 sm:block">
                                    {{ $article['excerpt'] }}
                                </p>
                                <p class="mt-1 text-xs font-medium text-[var(--color-overlay-foreground)]/70">
                                    {{ $article['author'] }} &middot; {{ $article['date'] }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <button class="carousel__control carousel__control--prev" type="button" aria-label="Sebelumnya">
            <x-icons.chevron-left />
        </button>
        <button class="carousel__control carousel__control--next" type="button" aria-label="Selanjutnya">
            <x-icons.chevron-right />
        </button>

        <ul class="carousel__indicators">
            @foreach ($primaryArticles as $index => $article)
                <li>
                    <button class="carousel__indicator" type="button" aria-label="Slide {{ $index + 1 }}"></button>
                </li>
            @endforeach
        </ul>

    </div>
</div>
