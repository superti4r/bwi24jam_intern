@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="space-y-10">
    <x-app.latest-articles :articles="$latest" />
    <x-app.list-articles :articles="$articles" />
</div>
@endsection
