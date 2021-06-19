@extends('bookapp.layout')
@section('content')
@include('bookapp._member')


<div class="container member-slides">
    <div class="row ">
        <h5>@if($member->nickname) {{$member->nickname}} @else {{ $member->name }} @endifの投稿一覧</h5>
        @include('bookapp._slides')
    </div>
</div>

@endsection
