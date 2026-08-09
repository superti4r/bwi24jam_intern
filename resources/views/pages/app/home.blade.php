@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="space-y-10">
    <x-app.latest-articles />
    <x-app.list-articles />
</div>
@endsection