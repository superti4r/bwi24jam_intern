@extends('layouts.app')

@section('title', 'Manajemen Artikel')

@section('content')
    <div class="page">
        <div class="page__header">
            <div class="page__headline">
                <h1 class="page__title">Manajemen Artikel</h1>
                <p class="page__description">Kelola seluruh artikel pada aplikasi.</p>
            </div>

            <div class="page__action">
                <a href="{{ route('articles.create') }}" class="button button--primary">
                    <x-icons.plus class="w-4 h-4" />
                    Tambah Artikel
                </a>
            </div>
        </div>

        <div class="card w-full">
            <div class="card__header card__header--alt">
                <h2 class="card__title m-0">Daftar Artikel</h2>
            </div>

            <div class="scroll-area w-full" data-stisla-scroll-area data-stisla-scroll-area-overflow-y="hidden">
                <table class="table table--hover table--align-middle min-w-max">
                    <thead>
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        @if ($article->thumbnail)
                                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                                                class="h-10 w-14 rounded object-cover">
                                        @endif
                                        <div class="font-medium text-[var(--color-foreground)]">{{ $article->title }}</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge--soft">{{ $article->category?->name }}</span>
                                </td>
                                <td>{{ $article->user?->name }}</td>
                                <td>
                                    <span
                                        class="badge badge--soft {{ $article->status === App\Enum\Status::PUBLISHED ? 'badge--success' : ($article->status === App\Enum\Status::ARCHIVED ? 'badge--warning' : '') }}">
                                        {{ $article->status->label() }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="flex items-center justify-end gap-2">
                                        @if (auth()->user()->hasRole(App\Enum\Role::ADMINISTRATOR) || $article->user_id === auth()->id())
                                            <a href="{{ route('articles.edit', $article) }}"
                                                class="button button--sm button--ghost button--neutral button--icon-only"
                                                aria-label="Ubah {{ $article->title }}" title="Ubah">
                                                <x-icons.pencil class="w-4 h-4" />
                                            </a>
                                            <button type="button"
                                                class="button button--sm button--ghost button--danger button--icon-only"
                                                aria-label="Hapus {{ $article->title }}" title="Hapus"
                                                data-stisla-dialog-trigger="dlg-delete-{{ $article->id }}">
                                                <x-icons.trash class="w-4 h-4" />
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-10 text-[var(--color-muted-foreground)]">
                                    Belum ada artikel.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @foreach ($articles as $article)
            <form id="delete-form-{{ $article->id }}" method="POST" action="{{ route('articles.destroy', $article) }}"
                class="hidden">
                @csrf
                @method('DELETE')
            </form>

            <div class="dialog dialog--sm" id="dlg-delete-{{ $article->id }}" data-stisla-dialog role="alertdialog"
                aria-labelledby="dlg-delete-{{ $article->id }}-label" aria-describedby="dlg-delete-{{ $article->id }}-desc">
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
                            <h3 class="dialog__title m-0 mb-1" id="dlg-delete-{{ $article->id }}-label">
                                Hapus artikel ini?
                            </h3>
                            <p class="text-[var(--color-muted-foreground)] m-0" id="dlg-delete-{{ $article->id }}-desc">
                                Artikel "{{ $article->title }}" akan dihapus permanen. Tindakan ini tidak dapat dibatalkan.
                            </p>
                        </div>
                        <div class="dialog__footer justify-center">
                            <button class="button button--ghost button--neutral" data-stisla-dialog-dismiss>
                                Batal
                            </button>
                            <button type="submit" form="delete-form-{{ $article->id }}" class="button button--danger"
                                data-stisla-dialog-dismiss>
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="flex justify-end">
            {{ $articles->links() }}
        </div>
    </div>
@endsection