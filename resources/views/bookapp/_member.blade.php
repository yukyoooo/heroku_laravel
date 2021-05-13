<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">メンバー詳細</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="card-text" style="margin-bottom:0;"><small class="text-muted">Name</small></p>
                    <h5 class="card-title">{{ $member->name }}</h5>

                    <p class="card-text" style="margin-bottom:0;"><small class="text-muted">introduction</small></p>
                    <p class="card-text">{{ $member->introduction }}</p>

                    <p class="card-text" style="margin-bottom:0;"><small class="text-muted">一番好きな本</small></p>
                    <p class="card-text">{{ $member->favorite_book }}</p>

                    <p class="card-text" style="margin-bottom:0;"><small class="text-muted">次に好きな本</small></p>
                    <p class="card-text">{{ $member->favorite_book2 }}</p>

                    <p class="card-text" style="margin-bottom:0;"><small class="text-muted">お気に入りの本</small></p>
                    <p class="card-text">{{ $member->favorite_book3 }}</p>

                    <a class="btn btn-info" href="{{ route('bookapp.user.user') }}">一覧へ戻る</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
