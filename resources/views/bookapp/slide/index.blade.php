@extends('bookapp.layout')

@section('content')


<div class="top-image" style="margin-top:-63px;">
    <h1 class="top-title">Out Book</h1>
    <p>let's output a book ! out book!</p>
</div>
<div class="container">
    <div class="row ">
        @include('bookapp._slides')

    </div>
    {{  $slides->links() }}
</div>
@endsection
