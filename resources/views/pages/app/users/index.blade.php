@extends('layouts.app')

@section('title', 'Pengguna')

@section('content')
    @include('components.app.page-header', [
        'title' => 'Pengguna',
        'eyebrow' => 'Administrasi',
        'description' => 'Kelola akun, role, dan akses pengguna website.',
    ])

    <div class="mx-auto max-w-[90rem] px-5 py-8 sm:px-8 lg:px-12">
        @if (session('status'))
            <p class="mb-6 border-l-2 border-primary bg-surface px-4 py-3 text-sm" role="status">{{ session('status') }}</p>
        @endif

        @if ($users->isEmpty())
            <div class="border border-border bg-surface p-8">
                <h2 class="text-2xl font-semibold tracking-[-0.04em]">Belum ada pengguna</h2>
                <p class="mt-3 text-sm leading-6 text-muted">Buat akun pertama untuk mengelola akses website.</p>
                <a href="{{ route('dashboard.users.create') }}"
                    class="mt-6 inline-flex min-h-11 items-center bg-primary px-4 text-sm font-semibold text-white hover:bg-primary/85">Tambah
                    pengguna</a>
            </div>
        @else
            @include('pages.app.users.partials.table')
        @endif
    </div>
@endsection