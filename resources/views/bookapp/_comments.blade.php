
@if (session('commentstatus'))
    <div class="alert alert-success mt-4 mb-4">
    {{ session('commentstatus') }}
    </div>
@endif

<section class="col-10 comments-wrapper">

    @auth
    <form style="margin-top:50px;" method="POST" action="{{ route('comment.store') }}">
    @csrf
        <input name="post_id" type="hidden" value="{{ $slide->id }}">
        <div class="form-group">
        @if($login_user->nickname)
            {{ $login_user->nickname}}
        @else
            {{ $login_user->name }}
        @endif
            <textarea id="comment" type="text" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="2">{{ old('comment') }}</textarea>
            @if ($errors->has('comment'))
                <div class="invalid-feedback">
                    {{ $errors->first('comment') }}
                </div>
            @endif
            <div class="mt-4 float-right">
                <button type="submit" class="btn btn-brown">コメント</button>
            </div>
        </div>
    </form>
    @endauth
    <h2 class="h5" style="margin-top:100px;">{{ $slide->comments->count()}}件のコメント</h2>
    @forelse($slide->comments as $comment)
        <div class="border-top p-4">
            <time class="text-secondary">
                @if($comment->nickname)
                    {{ $comment->nickname}}
                @else
                    {{ $comment->name }}
                @endif
                /
                {{ $comment->created_at->format('Y.m.d H:i') }} /
            </time>
            <p class="mt-2">
                {!! nl2br(e($comment->comment)) !!}
            </p>
        </div>
    @empty
    @endforelse
</section>
