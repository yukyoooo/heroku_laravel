@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    indexです!

                    <form method="GET" action="{{ route('contact.create') }}">
                        <button type ="submit" class="btn btn-primary">
                            新規登録
                        </button>
                    </form>
                    <form method="GET" action="{{ route('contact.index') }}" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">検索する</button>
                    </form>



                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="co2">名前</th>
                        <th scope="co3">タイトル</th>
                        <th scope="co4">登録日時</th>
                        <th scope="co5">詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td> {{ $contact->your_name }}</td>
                            <td>{{ $contact->title }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td><a href={{ route('contact.show', ['id' => $contact->id]) }} class="btn btn-primary">詳細をみる</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
