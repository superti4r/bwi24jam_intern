<div x-show="isSidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 flex pointer-events-none" x-cloak
    style="display: none;">

    <div class="absolute inset-0 bg-gray-900/50 dark:bg-black/60 backdrop-blur-sm pointer-events-auto"
        @click="isSidebarOpen = false"></div>

    <div class="w-[280px] max-w-[80vw] shrink-0 h-full pointer-events-none"></div>

    <div class="flex items-center pl-3 sm:pl-5 h-full z-50 pointer-events-none">
        <button type="button" @click="isSidebarOpen = false"
            class="button button--primary flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 !rounded-full hover:scale-105 transition-transform focus:outline-none pointer-events-auto shadow-xl"
            aria-label="Tutup Menu">
            <x-icons.close />
        </button>
    </div>
</div>

<div x-show="isSidebarOpen" x-transition:enter="transition ease-out duration-300 transform"
    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed top-0 left-0 w-[280px] max-w-[80vw] h-full bg-white dark:bg-gray-900 z-50 flex flex-col border-r border-gray-200 dark:border-gray-800 overflow-hidden"
    x-cloak style="display: none;">

    <div class="absolute bottom-0 left-0 w-full h-[70%] z-0 pointer-events-none">
        <div
            class="absolute inset-0 bg-gradient-to-b from-white via-white/80 to-transparent dark:from-gray-900 dark:via-gray-900/70 dark:to-transparent z-10">
        </div>
        <img src="{{ asset('images/bwi24jam_B4r5cfqe3RkYBAQ9nidg1suYXnl7C1Trqq8wNJ2EU8s.webp') }}" alt=""
            class="w-full h-full object-cover object-bottom opacity-100">
    </div>

    <nav class="relative z-20 flex-1 overflow-y-auto px-4 py-6 flex flex-col space-y-1">

        <div class="mb-8 px-4">
            <a href="/" class="inline-block transition-transform hover:scale-105 duration-200">
                <img src="{{ asset('images/bwi24jam_exEdQ4JEsL87D0C5O28lxjgx1H8xByAV2ocPy3Gd4aM.png') }}"
                    alt="{{ config('app.name') }}" class="h-8 w-auto object-contain">
            </a>
        </div>

        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100/60 dark:hover:bg-gray-800/60 rounded-lg transition-colors">
            Beranda
        </a>
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100/60 dark:hover:bg-gray-800/60 rounded-lg transition-colors">
            Artikel
        </a>
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100/60 dark:hover:bg-gray-800/60 rounded-lg transition-colors">
            Tentang Kami
        </a>
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100/60 dark:hover:bg-gray-800/60 rounded-lg transition-colors">
            Kontak
        </a>
    </nav>

    <div class="relative z-20 p-4 pb-6 bg-transparent">
        <a href="{{ route('login') }}"
            class="button button--primary w-full flex items-center justify-center py-2.5 text-sm font-medium">
            Masuk
        </a>
    </div>
</div>