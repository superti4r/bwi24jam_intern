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
    class="fixed top-0 left-0 w-[280px] max-w-[80vw] h-full bg-white dark:bg-gray-900 z-50 flex flex-col border-r border-gray-200 dark:border-gray-800"
    x-cloak style="display: none;">

    <nav class="flex-1 overflow-y-auto px-4 py-6 flex flex-col space-y-1">
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-800/50 rounded-lg transition-colors">
            Beranda
        </a>
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-800/50 rounded-lg transition-colors">
            Artikel
        </a>
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-800/50 rounded-lg transition-colors">
            Tentang Kami
        </a>
        <a href="#"
            class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-gray-800/50 rounded-lg transition-colors">
            Kontak
        </a>
    </nav>

    <div class="p-4 border-t border-gray-200 dark:border-gray-800">
        <a href="{{ route('login') }}" class="button button--primary w-full flex items-center justify-center py-2.5 text-sm font-medium">
            Masuk
        </a>
    </div>
</div>