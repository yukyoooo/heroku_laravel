@extends('bookapp.layout')
@section('content')
@include('bookapp._member')


<div class="container">
    <div class="row justify-content-center">
        <h5 style="margin-top:100px;">{{ $member->name }}の投稿一覧</h5>
        @include('bookapp._slides')
    </div>
</div>

@endsection
