@extends('bookapp.layout')

@section('content')


<div class="container " style="margin-top:100px;">
    <div class="row">
        @foreach($slides as $slide)
        <div class="col-1 booklist" style="margin-top:30px;">
            <a href="{{ route('bookapp.slide.show', ['id' => $slide->id ]) }}">
                <img src="{{ $slide->image_path }}" alt="{{ $slide->book_title }}" width="100%" >
            </a>
        </div>
        @endforeach
    </div>
</div>
