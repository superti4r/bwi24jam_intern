<section
    class="w-full bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 transition-colors duration-200">
    <div class="flex items-center justify-between gap-4 max-w-screen-2xl mx-auto px-4 md:px-8 py-2 overflow-x-hidden">

        <div class="flex items-center gap-2 sm:gap-3 shrink-0">
            <a href="#"
                class="flex items-center gap-1.5 text-[13px] font-semibold text-gray-700 dark:text-gray-200 hover:text-primary dark:hover:text-primary transition-colors group cursor-pointer">
                <span class="text-gray-400 group-hover:text-primary transition-colors">
                    <x-icons.maps class="w-3.5 h-3.5 sm:w-4 sm:h-4" />
                </span>
                {{ $weather ? $weather->location : 'Banyuwangi, Jawa Timur' }}
            </a>

            <span class="text-[13px] font-medium text-gray-500 dark:text-gray-400 whitespace-nowrap">
                {{ $currentDate }}
            </span>
        </div>

        <div class="flex items-center gap-3 shrink-0">
            <div
                class="flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-gray-50 dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 shadow-sm">
                @if($weather)
                    <span class="text-yellow-500 dark:text-yellow-400">
                        <x-dynamic-component :component="'icons.' . $weather->iconType" class="w-3.5 h-3.5 sm:w-4 sm:h-4" />
                    </span>
                    <span class="text-[13px] font-bold text-gray-800 dark:text-gray-100">
                        {{ $weather->temperature }}°C
                    </span>
                    <span
                        class="text-[13px] font-medium text-gray-500 dark:text-gray-400 ml-0.5 hidden sm:block whitespace-nowrap">
                        {{ $weather->description }}
                    </span>
                @else
                    <span class="text-[13px] font-medium text-gray-500 dark:text-gray-400">
                        Memuat data cuaca...
                    </span>
                @endif
            </div>
        </div>
    </div>
</section>