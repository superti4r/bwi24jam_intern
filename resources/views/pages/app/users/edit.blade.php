@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
    @include('components.app.page-header', [
        'title' => 'Edit Pengguna',
        'eyebrow' => 'Administrasi',
        'description' => 'Perbarui profil dan role akses pengguna.',
    ])

    <div class="mx-auto max-w-4xl px-5 py-8 sm:px-8 lg:px-12">
        <form method="POST" action="{{ route('dashboard.users.update', $user) }}"
            class="border border-border bg-background p-5 sm:p-8 lg:p-10">
            @csrf
            @method('PUT')

            @include('pages.app.users.partials.form', ['user' => $user])

            <button type="submit"
                class="mt-8 min-h-12 bg-primary px-5 text-sm font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Perbarui
                pengguna</button>
        </form>
    </div>
@endsection