@extends('layouts.app')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="page">
    <div class="page__header">
        <div class="page__headline">
            <h1 class="page__title">Manajemen Kategori</h1>
            <p class="page__description">Kelola kategori artikel yang tersedia pada aplikasi.</p>
        </div>
    </div>

    <div class="card w-full">
        <div class="card__header card__header--alt">
            <h2 class="card__title m-0">Daftar Kategori</h2>
            <a href="{{ route('administrator.categories.create') }}" class="button button--sm button--primary ms-auto">
                <x-icons.plus class="w-4 h-4" />
                Tambah Kategori
            </a>
        </div>

        <div class="scroll-area w-full" data-stisla-scroll-area data-stisla-scroll-area-overflow-y="hidden">
            <table class="table table--hover table--align-middle min-w-max">
                <thead>
                    <tr>
                        <th scope="col">Kategori</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>
                                <div class="font-medium text-[var(--color-foreground)]">{{ $category->name }}</div>
                            </td>
                            <td class="text-end">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('administrator.categories.edit', $category) }}"
                                        class="button button--sm button--ghost button--neutral button--icon-only"
                                        aria-label="Ubah {{ $category->name }}" title="Ubah">
                                        <x-icons.pencil class="w-4 h-4" />
                                    </a>
                                    <button type="button"
                                        class="button button--sm button--ghost button--danger button--icon-only"
                                        aria-label="Hapus {{ $category->name }}" title="Hapus"
                                        data-stisla-dialog-trigger="dlg-delete-{{ $category->id }}">
                                        <x-icons.trash class="w-4 h-4" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-10 text-[var(--color-muted-foreground)]">
                                Belum ada kategori.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @foreach ($categories as $category)
        <form id="delete-form-{{ $category->id }}" method="POST"
            action="{{ route('administrator.categories.destroy', $category) }}" class="hidden">
            @csrf
            @method('DELETE')
        </form>

        <div class="dialog dialog--sm" id="dlg-delete-{{ $category->id }}" data-stisla-dialog role="alertdialog"
            aria-labelledby="dlg-delete-{{ $category->id }}-label" aria-describedby="dlg-delete-{{ $category->id }}-desc">
            <div class="dialog__backdrop" data-stisla-dialog-dismiss></div>
            <div class="dialog__panel">
                <div class="dialog__content">
                    <button class="dialog__close" data-stisla-dialog-dismiss aria-label="Tutup">
                        <x-icons.close />
                    </button>
                    <div class="dialog__body text-center pt-6">
                        <span class="icon-box icon-box--danger icon-box--circle mb-3"
                            style="--icon-box-size: 3rem; --icon-box-icon-size: 1.25rem;">
                            <x-icons.trash />
                        </span>
                        <h3 class="dialog__title m-0 mb-1" id="dlg-delete-{{ $category->id }}-label">
                            Hapus kategori ini?
                        </h3>
                        <p class="text-[var(--color-muted-foreground)] m-0" id="dlg-delete-{{ $category->id }}-desc">
                            Kategori "{{ $category->name }}" akan dihapus permanen. Tindakan ini tidak dapat
                            dibatalkan.
                        </p>
                    </div>
                    <div class="dialog__footer justify-center">
                        <button class="button button--ghost button--neutral" data-stisla-dialog-dismiss>
                            Batal
                        </button>
                        <button type="submit" form="delete-form-{{ $category->id }}" class="button button--danger"
                            data-stisla-dialog-dismiss>
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="flex justify-end">
        {{ $categories->links() }}
    </div>
</div>
@endsection
