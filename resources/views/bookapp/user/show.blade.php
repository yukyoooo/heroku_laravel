@extends('bookapp.layout')
@section('content')
　Todo:<br>
　　[未着手]全体的なデザイン<br>
@include('bookapp._member')
<div class="container">
    <div class="row justify-content-center">
        @include('bookapp._slides')
    </div>
</div>

@endsection
