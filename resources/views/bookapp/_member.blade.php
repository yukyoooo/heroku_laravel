<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 member-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <p class="" style="margin-bottom:0;"><small class="text-muted">Name(nickname)</small></p>
            <h5 class=""><span>
                @if($member->nickname)
                {{ $member->nickname}}
                @else
                {{ $member->name }}
                @endif
            </span></h5>
            <div class="book-introduce">
                @if($member->favorite_book)
                <p class="" style="margin-bottom:0;"><small class="text-muted">一番好きな本</small></p>
                <p class="">{{ $member->favorite_book }}</p>
                @endif
                @if($member->favorite_book2)
                <p class="" style="margin-bottom:0;"><small class="text-muted">次に好きな本</small></p>
                <p class="">{{ $member->favorite_book2 }}</p>
                @endif
                @if($member->favorite_book3)
                <p class="" style="margin-bottom:0;"><small class="text-muted">お気に入りの本</small></p>
                <p class="">{{ $member->favorite_book3 }}</p>
                @endif
            </div>
            <div class="introduce">
                <p class="" style="margin-bottom:0;"><small class="text-muted">introduction</small></p>
                @if($member->introduction)
                <p class="">{{ $member->introduction }}</p>
                @else
                <p>紹介文が記載されておりません。</p>
                @endif
            </div>
            <div class="btn-wrapper">
                <a class="btn btn-brown" href="{{ route('bookapp.user.user') }}">一覧へ戻る</a>
            </div>
            </table>
        </div>
    </div>
</div>
