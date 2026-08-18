@extends('layouts.app')
@section('title', 'Ubah Halaman')
@section('content')
    @include('components.app.page-header', ['title' => $page->title, 'eyebrow' => 'Penyusun halaman', 'description' => 'Atur informasi halaman dan susunan bagian secara responsif.'])
    <div class="mx-auto max-w-[90rem] px-5 py-8 sm:px-8 lg:px-12">@if(session('status'))
        <p class="mb-6 border-l-2 border-primary bg-surface px-4 py-3 text-sm" role="status">{{ session('status') }}</p>
    @endif
        <div class="grid gap-8 lg:grid-cols-[minmax(0,0.7fr)_minmax(0,1.3fr)] lg:items-start">
            <form method="POST" action="{{ route('dashboard.pages.update', $page) }}"
                class="flex flex-col gap-6 border border-border bg-background p-5 sm:p-8">@csrf @method('PUT')
                @include('pages.app.pages.partials.page-form', ['page' => $page])<button
                    class="min-h-12 bg-primary px-5 text-sm font-semibold text-white hover:bg-primary/85">Perbarui
                    halaman</button></form>
            <section>
                <div class="flex flex-col gap-4 border-b border-border pb-5 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-primary">Susunan konten</p>
                        <h2 class="mt-3 text-3xl font-semibold tracking-[-0.06em]">{{ $page->sections->count() }} bagian
                        </h2>
                    </div><a href="{{ route('dashboard.pages.sections.create', $page) }}"
                        class="inline-flex min-h-11 items-center justify-center bg-primary px-4 text-sm font-semibold text-white hover:bg-primary/85">Tambah
                        bagian</a>
                </div>
                <div class="mt-4 flex flex-col gap-3">@forelse($page->sections as $section)
                    <article class="border border-border bg-surface p-4 sm:p-5">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                            <div class="flex gap-4"><span
                                    class="font-mono text-xs text-muted">{{ str_pad($section->sort_order, 2, '0', STR_PAD_LEFT) }}</span>
                                <div>
                                    <p class="text-[10px] font-semibold uppercase tracking-[0.16em] text-primary">
                                        {{ $section->type->label() }}</p>
                                    <h3 class="mt-2 text-lg font-semibold">{{ $section->heading ?: 'Tanpa judul' }}</h3>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-3 text-sm"><a
                                    href="{{ route('dashboard.pages.sections.edit', [$page, $section]) }}"
                                    class="font-semibold text-primary underline underline-offset-4">Ubah</a>
                                <form method="POST"
                                    action="{{ route('dashboard.pages.sections.move', [$page, $section, 'up']) }}">
                                    @csrf<button @disabled($loop->first)
                                        class="text-muted underline underline-offset-4 disabled:cursor-not-allowed disabled:opacity-40">Naik</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('dashboard.pages.sections.move', [$page, $section, 'down']) }}">
                                    @csrf<button @disabled($loop->last)
                                        class="text-muted underline underline-offset-4 disabled:cursor-not-allowed disabled:opacity-40">Turun</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('dashboard.pages.sections.destroy', [$page, $section]) }}">@csrf
                                    @method('DELETE')<button
                                        class="font-semibold text-red-700 underline underline-offset-4">Hapus</button>
                                </form>
                            </div>
                        </div>
                </article>@empty<div class="border border-border bg-surface p-8">
                        <h3 class="text-xl font-semibold">Belum ada bagian</h3>
                        <p class="mt-2 text-sm text-muted">Tambahkan bagian pembuka, teks berformat, atau gambar/video untuk
                            mulai menyusun halaman.</p>
                    </div>@endforelse
                </div>
            </section>
        </div>
    </div>
@endsection