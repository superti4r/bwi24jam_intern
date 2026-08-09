@extends('layouts.guest')

@section('title', 'Beranda')

@section('content')
<div class="space-y-10">
    <x-guest.latest-articles />
    <x-guest.list-articles />
</div>
@endsection