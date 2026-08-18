@extends('layouts.home')

@section('title', 'Beranda')

@section('content')
    <main>
        @include('components.home.hero')
        @include('components.home.welcomer')
        @include('components.home.latest-article')
        @include('components.home.article-list')
        @include('components.home.secondary-hero')
    </main>
    @include('components.home.footer')
@endsection
