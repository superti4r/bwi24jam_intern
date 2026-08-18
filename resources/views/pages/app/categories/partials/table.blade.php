<div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-muted">Daftar kategori</p><a
        href="{{ route('dashboard.categories.create') }}"
        class="w-full bg-primary px-4 py-3 text-center text-sm font-semibold text-white transition-colors hover:bg-primary/85 sm:w-auto">Tambah
        kategori</a>
</div>
<div class="mt-5"><x-app.data-table>
        <table class="min-w-[620px] w-full text-left text-sm">
            <thead
                class="border-b border-border bg-surface text-[10px] font-semibold uppercase tracking-[0.16em] text-muted">
                <tr>
                    <th class="px-5 py-4">Nama</th>
                    <th class="px-5 py-4">Slug tetap</th>
                    <th class="px-5 py-4">Artikel</th>
                    <th class="px-5 py-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">@foreach($categories as $category)
                <tr class="transition-colors hover:bg-surface/60">
                    <td class="px-5 py-5 font-semibold">{{ $category->name }}</td>
                    <td class="px-5 py-5 font-mono text-xs text-muted">{{ $category->slug }}</td>
                    <td class="px-5 py-5"><span class="text-primary">{{ $category->articles_count }}</span><span
                            class="text-muted"> artikel</span></td>
                    <td class="px-5 py-5 text-right">
                        <div class="flex justify-end gap-4">
                            <a href="{{ route('dashboard.categories.edit', $category) }}"
                                class="font-semibold text-primary underline underline-offset-4">Edit</a>
                            <button type="button" data-confirm-open="delete-category-{{ $category->id }}"
                                class="font-semibold text-red-700 underline underline-offset-4">Hapus</button>
                        </div>
                    </td>
            </tr>@endforeach
            </tbody>
        </table>
    </x-app.data-table></div>
<div class="mt-5 border-t border-border pt-5">{{ $categories->onEachSide(1)->links() }}</div>
@foreach ($categories as $category)
    <x-app.confirm-dialog id="delete-category-{{ $category->id }}" title="Hapus kategori?"
        message="Kategori {{ $category->name }} akan dihapus dan tidak dapat dikembalikan."
        :action="route('dashboard.categories.destroy', $category)" />
@endforeach