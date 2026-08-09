<div class="flex-1 flex justify-center px-3 sm:px-6 md:px-8" x-data="articleSearch()"
    @keydown.escape="open = false" @click.outside="open = false">
    <div class="relative w-full max-w-3xl">
        <form action="#" method="GET" @submit.prevent="goToFirstResult()" class="flex">
            <div class="relative flex w-full items-stretch shadow-sm rounded-full">
                <input type="text" name="q" placeholder="Cari berita atau artikel..." autocomplete="off"
                    class="input w-full !rounded-r-none !rounded-l-full focus:z-10" x-model="query" x-ref="input"
                    @input.debounce.300ms="search()" @focus="search()" @click="open = true"
                    @keydown.arrow-down.prevent="move(1)" @keydown.arrow-up.prevent="move(-1)"
                    @keydown.enter.prevent="goToSelected()">
                <button type="submit"
                    class="button button--primary shrink-0 flex items-center justify-center !rounded-l-none !rounded-r-full px-3 sm:px-6">
                    <x-icons.search />
                </button>
            </div>
        </form>

        <div x-show="open && query.length >= 2" x-transition.opacity x-cloak
            class="absolute inset-x-0 top-full z-50 mt-2 flex max-h-[70vh] w-full flex-col overflow-y-auto rounded-md border border-[var(--color-border)] bg-[var(--color-surface)] p-2 shadow-[var(--shadow-md)]"
            role="menu" aria-label="Hasil pencarian">

            <template x-if="loading">
                <span class="menu__item text-[var(--color-muted-foreground)]">
                    Mencari...
                </span>
            </template>

            <template x-if="!loading && results.length === 0">
                <span class="menu__item text-[var(--color-muted-foreground)]">
                    Berita atau artikel tidak tersedia.
                </span>
            </template>

            <template x-for="(article, index) in results" :key="article.id">
                <a :href="article.url" class="menu__item" role="menuitem"
                    :class="{ 'bg-[var(--color-accent)]': index === activeIndex }"
                    @mouseenter="activeIndex = index">
                    <span class="flex w-full items-center gap-3">
                        <template x-if="article.thumbnail">
                            <img :src="'/storage/' + article.thumbnail" :alt="article.title"
                                class="h-10 w-14 shrink-0 rounded object-cover">
                        </template>
                        <template x-if="!article.thumbnail">
                            <span
                                class="flex h-10 w-14 shrink-0 items-center justify-center rounded bg-[var(--color-surface-2)]">
                                <x-icons.info class="h-4 w-4 text-[var(--color-muted-foreground)]" />
                            </span>
                        </template>
                        <span class="flex min-w-0 flex-col">
                            <span class="truncate font-medium" x-text="article.title"></span>
                            <span class="text-xs text-[var(--color-muted-foreground)]"
                                x-text="article.category ?? 'Artikel'"></span>
                        </span>
                    </span>
                </a>
            </template>
        </div>
    </div>
</div>

<script>
    function articleSearch() {
        return {
            query: '',
            results: [],
            loading: false,
            open: false,
            activeIndex: 0,
            search() {
                const q = this.query.trim();

                if (q.length < 2) {
                    this.results = [];
                    this.open = false;
                    return;
                }

                this.loading = true;
                this.open = true;
                this.activeIndex = 0;

                fetch("{{ route('articles.search') }}" + '?q=' + encodeURIComponent(q), {
                        headers: {
                            'Accept': 'application/json',
                        },
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        this.results = data.results || [];
                    })
                    .catch(() => {
                        this.results = [];
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            },
            move(step) {
                if (this.results.length === 0) return;

                this.activeIndex = (this.activeIndex + step + this.results.length) % this.results.length;
            },
            goToSelected() {
                if (this.results[this.activeIndex]) {
                    window.location.href = this.results[this.activeIndex].url;
                } else if (this.results.length > 0) {
                    window.location.href = this.results[0].url;
                }
            },
            goToFirstResult() {
                if (this.results.length > 0) {
                    window.location.href = this.results[0].url;
                }
            },
        };
    }
</script>
