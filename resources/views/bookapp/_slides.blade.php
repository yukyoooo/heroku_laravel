@foreach($slides as $slide)
<div class="col-4" style="margin-top:100px;">
    <iframe id="main-slide"
        class="card-img-top" alt="..."
        src="{{ $slide->slides_path}}"
        scrolling="no"
        allowtransparency="true"
        width="400"
        height="270"
        style="border:0;">
    </iframe>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4" style="margin-top:10px;">
                <img src="{{ $slide->image_path }}" alt="{{ $slide->book_title }}" width="100%" style="margin:10px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
            </div>
            <div class="col-md-8 ">
                <div class="float-right" style="margin:10px;">

                    @if($slide->liked)
                        <form action="{{ route('like.destroy', ['id' => $slide->id ]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-primary rounded-pill" data-like="{{ $slide->id }}">
                                <i class="far fa-thumbs-up"></i> {{ $slide->likes_count }}
                            </button>
                        </form>
                    @else
                        <form action="{{ route('like.store', ['id' => $slide->id ]) }}" method="post">
                            @csrf
                            <button class="btn btn-outline-secondary rounded-pill" data-like="{{ $slide->id }}">
                                <i class="far fa-thumbs-up"></i> {{ $slide->likes_count }}
                            </button>
                        </form>
                    @endif
                </div>
                <div class="card-body" style="margin-top:20px">
                    <h5 class="card-title">{{ $slide->book_title }}</h5>
                    <p class="card-text">{{ Str::limit($slide->book_detail, 50, '(…)' ) }}</p>
                    <p class="card-text"><small class="text-muted">{{ $slide->created_at->format('Y.m.d') }}<br>{{ $slide->user->name }}</small> <a class="btn float-right btn-sm btn-primary" href="{{ route('bookapp.slide.show', ['id' => $slide->id ]) }}" role="button"><i class="far fa-comment-dots"> {{ $slide->comments->count()}} </i>　詳細</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

