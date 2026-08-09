@extends('layouts.app')

@section('title', $page->title)

@section('content')
<div class="mx-auto max-w-4xl">
    <div class="card w-full">
        <div class="card__header card__header--alt">
            <h1 class="card__title m-0 text-lg sm:text-xl">{{ $page->title }}</h1>
        </div>

        <div class="card__body">
            <div class="ql-editor p-0 text-base leading-relaxed" style="min-height: auto;">
                {!! $page->content !!}
            </div>
        </div>
    </div>
</div>
@endsection
