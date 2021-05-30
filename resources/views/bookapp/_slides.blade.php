<!-- #toolbar=0&navpanes=0
PDFのパラメータまとめ
https://iritec.jp/web_service/6802/ -->
@foreach($slides as $slide)
<div class="col-4 slides-wrapper" style="margin-top:100px;">
    <div class="iframe-wrapper">
        <iframe id="main-slide"
            class="card-img-top" alt="..."
            src="{{ $slide->slides_path}}#toolbar=0&view=FitH"
            width="100%"
            height="200"
            style=" border: none;">
        </iframe>
    </div>
    <div class="card mb-3" style="max-width: 540px; margin-top:-6px;">
        <div class="row g-0">
            <div class="col-md-4" style="margin-top:5px;">
                <img src="{{ $slide->image_path }}" alt="{{ $slide->book_title }}" width="100%" style="margin:10px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
            </div>
            <div class="col-md-8 slides-text">
                <div class="tagAndLikesWrapper">
                    <div class="float-right" style="margin:10px;">
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
                    <p class="card-text float-left" style="margin-left:5px;">
                        @foreach($slide->tags as $tag)
                        <span class="badge badge-pill badge-secondary" style="margin-top:10px; padding:7px;">{{ $tag->name }}</span>
                        @endforeach
                    </p>
                </div>
                <div class="card-body" >
                    <h5 class="card-title">{{ $slide->book_title }}</h5>
                    <p class="card-text">{{ Str::limit($slide->book_detail, 50, '(…)' ) }}</p>
                    <div class="cardFooter">
                        <div class="float-left" style="">
                            <p class="card-text"><small class="text-muted">Date : {{ $slide->created_at->format('Y.m.d') }}</small></p>
                            <p class="card-text"><small  class="text-muted">Name :
                                @if($slide->user->nickname)
                                    {{ $slide->user->nickname}}
                                @else
                                    {{ $slide->user->name }}
                                @endif
                            </small></p>
                        </div>
                        <a class="btn btn-sm float-right btn-brown" href="{{ route('bookapp.slide.show', ['id' => $slide->id ]) }}" role="button"><i class="far fa-comment-dots"> {{ $slide->comments->count()}} </i>　詳細</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endforeach

