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


                    <button type ="submit" class="btn btn-primary">
                        <a class="text-light" href="{{ route('contact.create') }}">新規登録</a>
                    </button>



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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
