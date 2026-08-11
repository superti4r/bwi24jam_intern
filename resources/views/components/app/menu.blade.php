@auth
    <div class="px-4 pt-4">
        <p class="m-0 text-sm font-medium text-[var(--color-foreground)]">{{ auth()->user()->name }}</p>
        <hr class="separator my-3" />
    </div>

    <a href="{{ route('articles.index') }}"
        class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
        Artikel Saya
    </a>

    @if (auth()->user()->hasRole(App\Enum\Role::ADMINISTRATOR))
        <a href="{{ route('administrator.users.index') }}"
            class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
            Kelola User
        </a>
        <a href="{{ route('administrator.categories.index') }}"
            class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
            Data Kategori
        </a>
        <a href="{{ route('administrator.pages.index') }}"
            class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-[var(--color-muted-foreground)] hover:text-[var(--color-foreground)] hover:bg-[var(--color-accent)] rounded-lg transition-colors">
            Manajemen Halaman
        </a>
    @endif
@endauth