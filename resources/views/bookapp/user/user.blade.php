@extends('bookapp.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @foreach($users as $user)
            <form method="GET" action="{{ route('bookapp.user.show', ['id' => $user->id ]) }}">
            @csrf
                <div class="card rounded-3 d-flex flex-row bd-highlight mb-3">
                    <div class="pl-4 p-1 flex-fill bd-highlight">
                        <div id="emailHelp" class="form-text">Name</div>
                        <h5 class="card-title">{{ $user->name }}</h5>
                    </div>
                    <div class="p-1 flex-fill bd-highlight">
                        <div id="emailHelp" class="form-text">Favorite book</div>
                        <h5 class="card-title">{{ $user->favorite_book }}</h5>
                    </div>
                    <div class="p-1 flex-fill bd-highlight">
                        <div id="emailHelp" class="form-text">Favorite book2</div>
                        <h5 class="card-title">{{ $user->favorite_book2 }}</h5>
                    </div>
                    <div class="p-1 flex-fill bd-highlight">
                        <div id="emailHelp" class="form-text">Favorite book3</div>
                        <h5 class="card-title">{{ $user->favorite_book3 }}</h5>
                    </div>
                    <div class="p-2 pr-4 float-right" >
                        <input class="btn btn-primary btn-lg" type="submit" value="詳細を見る">
                    </div>
                </div>
            </form>
            @endforeach
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
