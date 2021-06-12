@extends('bookapp.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center members-wrapper">
        @foreach($users as $user)
        <div class="col-3" style="margin-top:30px;">
            <a href="{{ route('bookapp.user.show', ['id' => $user->id ]) }}">
                <div class="card  members">
                    <div class="card-body">
                        <h5 class="card-title">
                            @if($user->nickname)
                                {{ $user->nickname}}
                            @else
                                {{ $user->name }}
                            @endif</h5>
                        <p class="card-text">
                            @if($user->introduction)
                                {{ Str::limit($user->introduction, 65, '(…)' ) }}
                            @else
                                @if($user->nickname)
                                    {{ $user->nickname}}
                                @else
                                    {{ $user->name }}
                                @endif
                                だよ。よろしくね。<br>いっぱい本を読もう♪
                            @endif
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        {{ $users->links() }}
    </div>
</div>
@endsection
