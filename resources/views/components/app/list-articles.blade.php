<div class="w-full">
    @php
        $listArticles = [
            [
                'title' => 'Kearifan Lokal Banyuwangi dalam Menjaga Ekosistem Mangrove',
                'excerpt' => 'Masyarakat pesisir bersama pemerintah terus merehabilitasi hutan mangrove untuk menahan abrasi.',
                'author' => 'Siti Nurhaliza',
                'date' => '12 menit lalu',
                'category' => 'Lingkungan',
                'image' => asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp'),
                'url' => '#',
            ],
            [
                'title' => 'Puluhan Pesilat Ikuti Kejuaraan Nasional di Gedung Olahraga',
                'excerpt' => 'Kegiatan ini menjadi ajang pembinaan atlet pencak silat muda asal Banyuwangi.',
                'author' => 'Ahmad Fauzi',
                'date' => '25 menit lalu',
                'category' => 'Olahraga',
                'image' => asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp'),
                'url' => '#',
            ],
            [
                'title' => 'Taman Nasional Alas Purwo Kembali Dibuka untuk Wisatawan',
                'excerpt' => 'Pengunjung diwajibkan mengikuti protokol kesehatan selama berada di kawasan konservasi.',
                'author' => 'Dewi Lestari',
                'date' => '1 jam lalu',
                'category' => 'Pariwisata',
                'image' => asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp'),
                'url' => '#',
            ],
            [
                'title' => 'Harga Komoditas Perkebunan Meningkat, Petani Optimistis',
                'excerpt' => 'Kenaikan harga kopi dan kakao memberikan angin segar bagi petani di lereng Ijen.',
                'author' => 'Budi Hartono',
                'date' => '2 jam lalu',
                'category' => 'Ekonomi',
                'image' => asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp'),
                'url' => '#',
            ],
            [
                'title' => 'Kuliner Ikan Laut Bakar Jadi Incaran Wisatawan di Pesisir',
                'excerpt' => 'Beragam olahan seafood segar tersaji di warung-warung tepi pantai.',
                'author' => 'Rina Wulandari',
                'date' => '3 jam lalu',
                'category' => 'Kuliner',
                'image' => asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp'),
                'url' => '#',
            ],
            [
                'title' => 'Rekayasa Lalu Lintas Diberlakukan Selama Perayaan Hari Jadi',
                'excerpt' => 'Petugas dikerahkan di sejumlah titik rawan macet di pusat kota.',
                'author' => 'Andi Pratama',
                'date' => '4 jam lalu',
                'category' => 'Daerah',
                'image' => asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp'),
                'url' => '#',
            ],
        ];
        $featured = array_slice($listArticles, 0, 2);
        $rest = array_slice($listArticles, 2);
    @endphp

    <div class="space-y-10">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
            @foreach ($featured as $index => $article)
                <a href="{{ $article['url'] }}" class="card group overflow-hidden">
                    <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="card__image"
                        style="aspect-ratio: 4 / 3;">
                    <div
                        class="card__overlay flex flex-col justify-end gap-1 p-4 sm:p-6"
                        style="background: linear-gradient(to top, color-mix(in oklch, var(--color-overlay) 80%, transparent), color-mix(in oklch, var(--color-overlay) 35%, transparent), transparent);">
                        <span
                            class="inline-flex w-fit items-center rounded-full bg-[var(--color-primary)] px-2.5 py-0.5 text-[11px] font-semibold text-[var(--color-primary-foreground)] uppercase tracking-wider">
                            {{ $article['category'] }}
                        </span>
                        <h3
                            class="mt-2 text-lg sm:text-xl font-bold leading-snug text-[var(--color-overlay-foreground)] group-hover:underline">
                            {{ $article['title'] }}
                        </h3>
                        <p class="mt-1 text-sm leading-relaxed text-[var(--color-overlay-foreground)]/80">
                            {{ $article['excerpt'] }}
                        </p>
                        <p class="mt-1 text-xs font-medium text-[var(--color-overlay-foreground)]/70">
                            {{ $article['author'] }} &middot; {{ $article['date'] }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
            @foreach ($rest as $article)
                <a href="{{ $article['url'] }}" class="card group overflow-hidden">
                    <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="card__image"
                        style="aspect-ratio: 4 / 3;">
                    <div
                        class="card__overlay flex flex-col justify-end gap-1 p-4"
                        style="background: linear-gradient(to top, color-mix(in oklch, var(--color-overlay) 80%, transparent), color-mix(in oklch, var(--color-overlay) 35%, transparent), transparent);">
                        <span
                            class="inline-flex w-fit items-center rounded-full bg-[var(--color-primary)] px-2.5 py-0.5 text-[11px] font-semibold text-[var(--color-primary-foreground)] uppercase tracking-wider">
                            {{ $article['category'] }}
                        </span>
                        <h4 class="mt-2 text-base font-bold leading-snug text-[var(--color-overlay-foreground)] group-hover:underline">
                            {{ $article['title'] }}
                        </h4>
                        <p class="mt-1 text-xs font-medium text-[var(--color-overlay-foreground)]/70">
                            {{ $article['author'] }} &middot; {{ $article['date'] }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
