<div x-show="isSidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 flex pointer-events-none" x-cloak
    style="display: none;">

    <div class="absolute inset-0 bg-[var(--color-overlay)]/50 backdrop-blur-sm pointer-events-auto"
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