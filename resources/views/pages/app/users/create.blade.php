@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
    @include('components.app.page-header', [
        'title' => 'Tambah Pengguna',
        'eyebrow' => 'Administrasi',
        'description' => 'Buat akun baru dan tentukan role aksesnya.',
    ])

    <div class="mx-auto max-w-4xl px-5 py-8 sm:px-8 lg:px-12">
        <form method="POST" action="{{ route('dashboard.users.store') }}"
            class="border border-border bg-background p-5 sm:p-8 lg:p-10">
            @csrf

            @include('pages.app.users.partials.form', ['user' => null])

            <button type="submit"
                class="mt-8 min-h-12 bg-primary px-5 text-sm font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Simpan
                pengguna</button>
        </form>
    </div>
@endsection