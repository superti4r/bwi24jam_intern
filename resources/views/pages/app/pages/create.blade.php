@extends('layouts.app')
@section('title', 'Buat Halaman')
@section('content')
    @include('components.app.page-header', ['title' => 'Buat Halaman', 'eyebrow' => 'Penyusun halaman', 'description' => 'Tentukan identitas dan alamat halaman publik baru.'])
    <div class="mx-auto max-w-3xl px-5 py-8 sm:px-8 lg:px-12">
        <form method="POST" action="{{ route('dashboard.pages.store') }}"
            class="flex flex-col gap-6 border border-border bg-background p-5 sm:p-8">@csrf
            @include('pages.app.pages.partials.page-form', ['page' => null])<button
                class="min-h-12 bg-primary px-5 text-sm font-semibold text-white hover:bg-primary/85">Simpan
                halaman</button></form>
    </div>
@endsection