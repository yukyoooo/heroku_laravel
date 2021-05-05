
@if (session('commentstatus'))
    <div class="alert alert-success mt-4 mb-4">
    {{ session('commentstatus') }}
    </div>
@endif

<section class="col-10">

    @auth
    <form style="margin-bottom:50px;" method="POST" action="{{ route('comment.store') }}">
    @csrf
        <input name="post_id" type="hidden" value="{{ $slide->id }}">
        <div class="form-group">
        {{ $login_user->name }}
            <textarea id="comment" name="comment" value="a" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="2">
                {{ old('comment') }}
            </textarea>
            @if ($errors->has('comment'))
                <div class="invalid-feedback">
                    {{ $errors->first('comment') }}
                </div>
            @endif
            <div class="mt-4 float-right">
                <button type="submit" class="btn btn-primary">コメント</button>
            </div>
        </div>
    </form>
    @endauth
    <h2 class="h5">○○件のコメント</h2>
    @forelse($slide->comments as $comment)
        <div class="border-top p-4">
            <time class="text-secondary">
                {{ $comment->name }} /
                {{ $comment->created_at->format('Y.m.d H:i') }} /
            </time>
            <p class="mt-2">
                {!! nl2br(e($comment->comment)) !!}
            </p>
        </div>
    @empty
        <p>コメントはまだありません。</p>
    @endforelse
</section>
