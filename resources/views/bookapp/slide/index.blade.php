@extends('bookapp.layout')

@section('content')
<div class="container">
    <div class="row justify-content-evenly">
        @include('bookapp._slides')
        {{  $slides->links() }}
    </div>
</div>

@endsection
