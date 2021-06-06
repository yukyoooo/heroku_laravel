@extends('bookapp.layout')

@section('content')
<div class="container" style="margin-top:-40px;">
    <div class="row justify-content-center">
        <div class="col-12 main-wrapper">
            <iframe id="main-slide"
                class="card-img-top" alt="..."
                src="{{ $slide->slides_path}}#view=FitV"
                scrolling="no"
                allowtransparency="true"
                width="100%"
                height="630"
                style="border:0;">
            </iframe>
            <!-- <div class="btn-wrapper">
                <a id="btn-left" onclick="BtnClickLeft(); return false;" class="btn-left"><i class="fas fa-angle-left"></i></a>
                <a id="btn-right" onclick="BtnClickRight(); return false;" class="btn-right"><i class="fas fa-angle-right"></i></a>
                <script>
                    function BtnClickLeft() {
                        // alert('左が押されました');
                        // document.dispatchEvent( new KeyboardEvent( "keyup",{key: '37' })) ;
                        document.getElementById("btn-left").dispatchEvent( new KeyboardEvent( "keydown", { keyCode: 37 }));
                    };
                    function BtnClickRight() {
                        // alert('右が押されました');
                        // document.dispatchEvent( new KeyboardEvent( "keyup",{key: '39' })) ;
                        document.getElementById("main-slide").focus();
                        document.getElementById("btn-right").dispatchEvent( new KeyboardEvent( "keydown", { keyCode: "a" }));

                    };
                </script>
            </div> -->
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-3 main-card-img">
                        <img src="{{ $slide->image_path }}" alt="{{ $slide->book_title }}" width="100%" style="margin:40px 20px 20px 20px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
                    </div>
                    <div class="col-md-9 main-card-body">
                        <div class="float-right"style="margin:10px;">
                            @if($slide->liked)
                                <div class="like-wrapper">
                                    <i class="far fa-thumbs-up like-toggle liked" data-slide-id="{{ $slide->id }}" ></i>
                                    <span class="like-counter">{{ $slide->likes_count }}</span>
                                </div>
                            @else
                                <div class="like-wrapper">
                                    <i class="far fa-thumbs-up like-toggle" data-slide-id="{{ $slide->id }}" ></i>
                                    <span class="like-counter">{{ $slide->likes_count }}</span>
                                </div>
                            @endif
                        </div>
                        <p class="card-text">
                            @foreach($slide->tags as $tag)
                            <span class="badge badge-pill badge-secondary" style="margin:20px 0 0 20px; padding:10px;">{{ $tag->name }}</span>
                            @endforeach
                        </p>
                        <div class="card-body">
                            <h5 class="card-title">{{ $slide->book_title }}</h5>
                            <div class="card-body-text">
                                <label>紹介文</label>
                                <p class="">{{ $slide->book_detail }}</p>
                            </div>
                            <div class="card-body-text">
                                <label>学んだこと</label>
                                <p class="">{{ $slide->output }}</p>
                            </div>
                            <p class="card-text" style="margin-top:10px;">
                                <small class="text-muted">
                                @if($slide->book_author)
                                    著者：{{ $slide->book_author }}
                                @endif
                                <br>
                                @if($slide->book_publishedDate)
                                    出版日：{{ $slide->book_publishedDate }}
                                @endif
                                </small></p>
                            <p class="card-text" style="margin-top:10px;">
                                <small class="text-muted">
                                @if($slide->user->nickname)
                                    {{ $slide->user->nickname }}　
                                @else
                                    {{ $slide->user->name }}　
                                @endif
                                {{ $slide->created_at }}</small></p>
                        </div>
                        @auth
                            @if( ( $slide->user->id ) === ( Auth::user()->id ) )
                            <div class="edit_delete_wrapper">
                                <div class="float-right" style="margin:10px;">
                                    <a class="btn btn-primary" href="{{ route('bookapp.slide.edit', ['id' => $slide->id ]) }}">編集</a>
                                </div>
                                <div class="float-right" style="margin:10px;">
                                    <form method="POST" action="{{ route('bookapp.slide.destroy', ['id' => $slide->id ]) }}" id="delete_{{ $slide->id }}">
                                    @csrf
                                        <a href="#" class="btn btn-danger" data-id="{{ $slide->id }}" onclick="deletePost(this);">削除</a>
                                    </form>
                                </div>
                            </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @include('bookapp._comments')
    </div>
</div>

<script>
function deletePost(e){
    'use strict';
    if (confirm('本当に削除していいですか？')){
        document.getElementById('delete_' + e.dataset.id).submit()
    }
}
</script>
@endsection
