<div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-muted">Artikel terbaru</p><a
        href="{{ route('dashboard.articles.create') }}"
        class="w-full bg-primary px-4 py-3 text-center text-sm font-semibold text-white transition-colors hover:bg-primary/85 sm:w-auto">Buat
        artikel</a>
</div>
<div class="mt-5"><x-app.data-table>
        <table class="min-w-[760px] w-full text-left text-sm">
            <thead
                class="border-b border-border bg-surface text-[10px] font-semibold uppercase tracking-[0.16em] text-muted">
                <tr>
                    <th class="px-5 py-4">Artikel</th>
                    <th class="px-5 py-4">Kategori</th>
                    <th class="px-5 py-4">Status</th>
                    <th class="px-5 py-4">Penulis</th>
                    <th class="px-5 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">@foreach ($articles as $article)
                <tr class="transition-colors hover:bg-surface/60">
                    <td class="px-5 py-5 font-semibold">{{ $article->title }}</td>
                    <td class="px-5 py-5 text-muted">{{ $article->category?->name ?? 'Tanpa kategori' }}</td>
                    <td class="px-5 py-5"><span
                            class="border border-border px-2 py-1 text-[10px] uppercase tracking-[0.12em] text-muted">{{ $article->status->value }}</span>
                    </td>
                    <td class="px-5 py-5 text-muted">{{ $article->user?->name }}</td>
                    <td class="px-5 py-5 text-right">
                        <div class="flex justify-end gap-4">
                            <a href="{{ route('dashboard.articles.edit', $article) }}"
                                class="font-semibold text-primary underline underline-offset-4">Edit</a>
                            <button type="button" data-confirm-open="delete-article-{{ $article->id }}"
                                class="font-semibold text-red-700 underline underline-offset-4">Hapus</button>
                        </div>
                    </td>
            </tr>@endforeach
            </tbody>
        </table>
    </x-app.data-table></div>
<div class="mt-5 border-t border-border pt-5">{{ $articles->onEachSide(1)->links() }}</div>
@foreach ($articles as $article)
    <x-app.confirm-dialog id="delete-article-{{ $article->id }}" title="Hapus artikel?"
        message="Artikel {{ $article->title }} akan dihapus dan tidak dapat dikembalikan."
        :action="route('dashboard.articles.destroy', $article)" />
@endforeach