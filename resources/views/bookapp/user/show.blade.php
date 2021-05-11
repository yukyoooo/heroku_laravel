@extends('bookapp.layout')
@section('content')
@include('bookapp._member')
<div class="container">
    <div class="row justify-content-center">
        @include('bookapp._slides')
    </div>
</div>

@endsection
