@extends('bookapp.layout')

@section('content')


　Todo:<br>
　　[　]画像のスライド表示<br>
　　[　]全体的なデザイン<br>
　　[　]コメント数を表示<br>
　　[　]コメントが書かれた際にTeams通知<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <img src="http://placehold.jp/300x200.png" class="card-img-top" alt="...">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="{{ $slide->image_path }}" alt="{{ $slide->book_title }}" width="100%" style="margin:10px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
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
                        <div class="card-body" style="margin-top:20px">
                            <h5 class="card-title">{{ $slide->book_title }}</h5>
                            <p class="card-text">{{ $slide->book_detail }}</p>
                            <p class="card-text"><small class="text-muted">{{ $slide->created_at }}<br>{{ $slide->user->name }}</small></p>

                        </div>
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
