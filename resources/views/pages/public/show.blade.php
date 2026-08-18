@extends('layouts.home')
@section('title', $page->title)
@section('content')
    <main>
        @foreach($page->sections as $section)@include('pages.public.sections.' . $section->type->value, ['section' => $section])@endforeach
    </main>
    @include('components.home.footer')
@endsection