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
                    <div class="col-md-3">
                        <img src="{{ $slide->image_path }}" alt="{{ $slide->book_title }}" width="100%" style="margin:20px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
                    </div>
                    <div class="col-md-9 ">
                        <div class="float-right"style="margin:10px;">
                            @if($slide->liked)
                                <form action="{{ route('like.destroy', $slide) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-primary btn-sm" data-like="{{ $slide->id }}">
                                        いいね <[ {{ $slide->likes_count }} ]
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('like.store', $slide) }}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-secondary btn-sm" data-like="{{ $slide->id }}">
                                        いいね <[ {{ $slide->likes_count }} ]
                                    </button>
                                </form>
                            @endif
                        </div>
                        <p class="card-text">
                            @foreach($slide->tags as $tag)
                            <span class="badge badge-pill badge-secondary" style="margin-top:20px; padding:7px;">{{ $tag->name }}</span>
                            @endforeach
                        </p>
                        <div class="card-body" style="margin-top:20px">
                            <h5 class="card-title">{{ $slide->book_title }}</h5>
                            <label>紹介文</label>
                            <p class="card-text">{{ $slide->book_detail }}</p>
                            <label>学んだこと</label>
                            <p class="card-text">{{ $slide->output }}</p>
                            <p class="card-text">
                                <small class="text-muted">{{ $slide->created_at }}<br>
                                @if($slide->user->nickname)
                                    {{ $slide->user->nickname }}
                                @else
                                    {{ $slide->user->name }}
                                @endif
                                </small></p>
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
