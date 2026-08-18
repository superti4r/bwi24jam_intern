<div class="grid gap-6">
    <div class="flex flex-col gap-2"><label for="title" class="text-sm font-medium">Judul halaman</label><input
            id="title" name="title" value="{{ old('title', $page?->title) }}" required
            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
    </div>
    <div class="flex flex-col gap-2"><label for="slug" class="text-sm font-medium">Alamat singkat</label><input
            id="slug" name="slug" value="{{ old('slug', $page?->slug) }}" required
            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
        <p class="text-xs text-muted">Hanya gunakan huruf, angka, tanda hubung, atau garis bawah.</p>
    </div>
    <div class="flex flex-col gap-2"><label for="status" class="text-sm font-medium">Status halaman</label><select
            id="status" name="status" required
            class="min-h-12 border border-border px-4 outline-none focus:border-primary focus:ring-2 focus:ring-primary/20">
            <option value="draft" @selected(old('status', $page?->status->value ?? 'draft') === 'draft')>Draf</option>
            <option value="published" @selected(old('status', $page?->status->value) === 'published')>Diterbitkan</option>
        </select></div>
</div>