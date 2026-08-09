<footer
    class="relative w-full bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 transition-colors duration-200 mt-auto overflow-hidden">

    <div class="hidden lg:block absolute top-0 right-0 w-[45%] h-full z-0 pointer-events-none">
        <div
            class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-transparent dark:from-gray-900 dark:via-gray-900/80 z-10">
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

                <p class="mt-5 text-[14px] leading-relaxed text-gray-500 dark:text-gray-400 max-w-sm">
                    Platform berita online seputar kota Banyuwangi, Jawa Timur. Menyajikan informasi terkini, akurat,
                    dan terpercaya untuk masyarakat.
                </p>

                <x-guest.footer-social />
            </div>

            <div>
                <h3 class="text-[13px] font-bold text-gray-900 dark:text-white uppercase tracking-wider">
                    Navigasi
                </h3>
                <ul class="mt-5 space-y-3">
                    <li>
                        <a href="#"
                            class="inline-block text-[14px] text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary hover:translate-x-1 transition-all duration-200">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-block text-[14px] text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary hover:translate-x-1 transition-all duration-200">
                            Artikel Terbaru
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-block text-[14px] text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary hover:translate-x-1 transition-all duration-200">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-block text-[14px] text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary hover:translate-x-1 transition-all duration-200">
                            Kontak
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-[13px] font-bold text-gray-900 dark:text-white uppercase tracking-wider">
                    Legalitas
                </h3>
                <ul class="mt-5 space-y-3">
                    <li>
                        <a href="#"
                            class="inline-block text-[14px] text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary hover:translate-x-1 transition-all duration-200">
                            Syarat & Ketentuan
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-block text-[14px] text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary hover:translate-x-1 transition-all duration-200">
                            Kebijakan Privasi
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-block text-[14px] text-gray-500 dark:text-gray-400 hover:text-primary dark:hover:text-primary hover:translate-x-1 transition-all duration-200">
                            Panduan Komunitas
                        </a>
                    </li>
                </ul>
            </div>

            <div class="hidden lg:block"></div>

        </div>

        <div
            class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-[13px] text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Hak cipta dilindungi undang-undang.
            </p>
        </div>

    </div>
</footer>