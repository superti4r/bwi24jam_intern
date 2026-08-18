<div class="grid gap-6 sm:grid-cols-2">
    <div class="flex flex-col gap-2 sm:col-span-2"><label for="title" class="text-sm font-medium">Judul
            artikel</label><input id="title" name="title" value="{{ old('title', $article?->title) }}" required
            class="min-h-12 border border-border bg-background px-4 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
    </div>
    <div class="flex flex-col gap-2"><label for="category_id" class="text-sm font-medium">Kategori</label><select
            id="category_id" name="category_id" required
            class="min-h-12 border border-border bg-background px-4 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">
            <option value="">Pilih kategori</option>@foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $article?->category_id) === $category->id)>
                    {{ $category->name }}
            </option>@endforeach
        </select></div>
    <div class="flex flex-col gap-2"><label for="thumbnail" class="text-sm font-medium">Thumbnail</label><input
            id="thumbnail" name="thumbnail" type="file" accept="image/*"
            class="min-h-12 border border-border bg-background px-4 py-3 text-sm"></div>
    @if ($article && auth()->user()->hasRole('administrator'))
        <div class="flex flex-col gap-2 sm:col-span-2"><label for="status" class="text-sm font-medium">Status</label><select
                id="status" name="status"
                class="min-h-12 border border-border bg-background px-4 outline-none transition-colors focus:border-primary focus:ring-2 focus:ring-primary/20">@foreach (\App\Enum\Status::cases() as $status)
                    <option value="{{ $status->value }}" @selected(old('status', $article->status->value) === $status->value)>
                        {{ ucfirst($status->value) }}
                </option>@endforeach
            </select></div>
    @endif
    <div class="flex flex-col gap-2 sm:col-span-2"><label class="text-sm font-medium">Isi artikel</label>
        <div data-quill-editor data-quill-input="#content-editor" class="min-h-64 border border-border"></div><textarea
            id="content-editor" name="content" hidden>{{ old('content', $article?->content) }}</textarea>
    </div>
</div>