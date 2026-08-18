@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <main class="min-h-screen">
        <div class="mx-auto max-w-[90rem] px-5 pb-16 pt-10 sm:px-8 sm:pb-24 sm:pt-14 lg:px-12 lg:pt-20">
            <div class="grid gap-12 lg:grid-cols-[minmax(0,1.35fr)_minmax(18rem,0.65fr)] lg:items-end lg:gap-24">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-primary">Ruang kerja pribadi</p>
                    <h1 class="mt-5 max-w-4xl text-[clamp(3rem,7vw,7rem)] font-semibold leading-[0.92] tracking-[-0.08em]">
                        Selamat datang,<br><span class="text-primary">{{ auth()->user()->name }}.</span></h1>
                </div>
                <div class="max-w-sm border-l border-primary pl-5 lg:mb-2">
                    <p class="text-lg leading-8 text-muted">Tempat untuk mengelola tulisan, meninjau publikasi, dan menjaga
                        alur kerja tetap sederhana.</p>
                </div>
            </div>

            <div class="mt-16 grid gap-4 border-t border-border pt-4 sm:mt-20 sm:grid-cols-3">
                <div class="border border-border bg-surface p-5">
                    <p class="text-[10px] uppercase tracking-[0.18em] text-muted">Akses</p>
                    <p class="mt-4 text-lg font-semibold">{{ ucfirst(auth()->user()->roles->value) }}</p>
                </div>
                <div class="border border-border bg-surface p-5">
                    <p class="text-[10px] uppercase tracking-[0.18em] text-muted">Status</p>
                    <p class="mt-4 text-lg font-semibold text-primary">Terverifikasi</p>
                </div>
                <div class="border border-border bg-surface p-5">
                    <p class="text-[10px] uppercase tracking-[0.18em] text-muted">Hari ini</p>
                    <p class="mt-4 text-lg font-semibold">{{ now()->translatedFormat('d F Y') }}</p>
                </div>
            </div>

            @php
                $dashboardWidgets = auth()->user()->hasRole('administrator') ? [['label' => 'Pengguna', 'description' => 'Kelola akun dan akses pengguna.', 'href' => route('dashboard')], ['label' => 'Artikel', 'description' => 'Tinjau dan kelola seluruh artikel.', 'href' => route('dashboard.articles.index')], ['label' => 'Kategori', 'description' => 'Atur pengelompokan artikel.', 'href' => route('dashboard.categories.index')], ['label' => 'Informasi Website', 'description' => 'Kelola konten utama halaman publik.', 'href' => route('dashboard.website-information.edit')], ['label' => 'Halaman', 'description' => 'Susun halaman publik khusus.', 'href' => route('dashboard.pages.index')]] : [['label' => 'Buat Artikel', 'description' => 'Tulis dan siapkan artikel baru.', 'href' => route('dashboard.articles.create')], ['label' => 'Lihat Artikel', 'description' => 'Tinjau artikel yang sudah Anda tulis.', 'href' => route('dashboard.articles.index')]];
            @endphp

            <section class="mt-16 sm:mt-20" aria-labelledby="quick-access-title">
                <div class="flex items-end justify-between border-b border-border pb-5">
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-primary">Mulai dari sini</p>
                        <h2 id="quick-access-title" class="mt-3 text-3xl font-semibold tracking-[-0.06em]">Akses Cepat</h2>
                    </div>
                </div>
                <div class="mt-4 flex flex-col">
                    @foreach ($dashboardWidgets as $index => $widget)
                        <a href="{{ $widget['href'] }}"
                            class="group grid gap-3 border-b border-border py-6 transition-colors hover:bg-surface sm:grid-cols-[4rem_minmax(0,1fr)_auto] sm:items-center sm:gap-6 sm:px-4"><span
                                class="font-mono text-xs text-muted">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <div>
                                <h3 class="text-xl font-semibold tracking-[-0.04em] transition-colors group-hover:text-primary">
                                    {{ $widget['label'] }}</h3>
                                <p class="mt-1 text-sm text-muted">{{ $widget['description'] }}</p>
                            </div><span class="text-xl text-primary transition-transform group-hover:translate-x-1"
                                aria-hidden="true">&rarr;</span>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection