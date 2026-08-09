<section
    class="w-full bg-[var(--color-surface)] border-b border-[var(--color-border)] transition-colors duration-200">
    <div class="flex items-center justify-between gap-4 max-w-screen-2xl mx-auto px-4 md:px-8 py-2 overflow-x-hidden">

        <div class="flex items-center gap-2 sm:gap-3 shrink-0">
            <a href="#"
                class="flex items-center gap-1.5 text-[13px] font-semibold text-[var(--color-muted-foreground)] hover:text-[var(--color-primary)] transition-colors group cursor-pointer">
                <span class="text-[var(--color-muted-foreground)] group-hover:text-[var(--color-primary)] transition-colors">
                    <x-icons.maps class="w-3.5 h-3.5 sm:w-4 sm:h-4" />
                </span>
                {{ $weather->location }}
            </a>

            <span class="text-[13px] font-medium text-[var(--color-muted-foreground)] whitespace-nowrap">
                {{ $currentDate }}
            </span>
        </div>

        <div class="flex items-center gap-3 shrink-0">
            <div
                class="flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-[var(--color-surface-2)] border border-[var(--color-border)] shadow-sm">
                @if($weather)
                    <span class="text-yellow-500 dark:text-yellow-400">
                        <x-dynamic-component :component="'icons.' . $weather->iconType" class="w-3.5 h-3.5 sm:w-4 sm:h-4" />
                    </span>
                    <span class="text-[13px] font-bold text-[var(--color-foreground)]">
                        {{ $weather->temperature }}°C
                    </span>
                    <span
                        class="text-[13px] font-medium text-[var(--color-muted-foreground)] ml-0.5 hidden sm:block whitespace-nowrap">
                        {{ $weather->description }}
                    </span>
                @else
                    <span class="text-[13px] font-medium text-[var(--color-muted-foreground)]">
                        Memuat data cuaca...
                    </span>
                @endif
            </div>
        </div>
    </div>
</section>