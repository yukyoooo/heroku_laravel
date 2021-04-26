@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    スライド修正ページ


                    <form method="POST" action="{{ route('bookapp.slide.update', ['id' => $slide->id ]) }}">
                    @csrf
                        タイトル
                        <input type="text" name="book_title" value="{{ $slide->book_title }}">
                        <br>
                        紹介内容
                        <textarea name="book_detail">{{ $slide->book_detail }}</textarea>
                        <br>
                        <br>
                        <input class="btn btn-info" type="submit" value="修正する">
                    </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
