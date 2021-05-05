@extends('layouts.app')
@section('content')
@include('bookapp._member')
ユーザ毎のスライド一覧

<div class="container">
    <div class="row justify-content-center">
        @include('bookapp._slides')
    </div>
</div>

@endsection
