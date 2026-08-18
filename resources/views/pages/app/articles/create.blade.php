@extends('layouts.app')

@section('title', 'Buat Artikel')

@section('content')
    @include('components.app.page-header', ['title' => 'Buat Artikel', 'eyebrow' => 'Konten', 'description' => 'Tulis artikel baru dengan editor yang nyaman untuk membaca.'])
    <div class="mx-auto max-w-5xl px-5 py-8 sm:px-8 lg:px-12">
        <form method="POST" action="{{ route('dashboard.articles.store') }}" enctype="multipart/form-data"
            class="flex flex-col gap-6 border border-border bg-background p-5 sm:p-8 lg:p-10">
            @csrf
            @include('pages.app.articles.partials.form', ['article' => null])
            <button type="submit"
                class="min-h-12 bg-primary px-5 text-sm font-semibold text-white transition-colors hover:bg-primary/85 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2">Simpan
                artikel</button>
        </form>
    </div>
@endsection