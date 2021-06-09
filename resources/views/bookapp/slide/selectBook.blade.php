@extends('bookapp.layout')

@section('content')
<div class="container selectbook-wrapper">
    <div class="row justify-content-center">
        <div class="col-11">

            <form action="{{ route('bookapp.slide.selectBook') }}" method="get" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">書籍名</span>
                    <input type="text" class="form-control" name="keyword" aria-label="Sizing example input" value="{{ $books['keyword'] }}" aria-describedby="inputGroup-sizing-default">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">検索する</button>
                </div>
            </form>

            @if ($books['items'] == null)
                <p style="height:330px;">書籍名を入力してください。</p>
            @else (count($books['items']) > 0)
                <p>「{{ $books['keyword'] }}」の検索結果です。読んだ本を選択してください</p>
            <div class="row justify-content-center">
                @foreach ($books['items'] as $item)
                <div class="col-3" style="margin-top:30px;">
                    <form action="{{ route('bookapp.slide.create') }}" method="get" >
                        <p>{{ $item['volumeInfo']['title']}}</p>
                        @if (array_key_exists('imageLinks', $item['volumeInfo']))
                            <img src="{{ $item['volumeInfo']['imageLinks']['thumbnail']}}"><br>
                            <input type="hidden" name="book_img" value="{{$item['volumeInfo']['imageLinks']['thumbnail']}}">
                        @endif

                        @if (array_key_exists('description', $item['volumeInfo']))
                            <input type="hidden" name="book_author" value="{{$item['volumeInfo']['authors'][0]}}">
                            <input type="hidden" name="book_title" value="{{$item['volumeInfo']['title']}}">
                            <input type="hidden" name="book_publishedDate" value="{{$item['volumeInfo']['publishedDate']}}">
                            <input type="hidden" name="book_detail" value="{{$item['volumeInfo']['description']}}">
                        @endif
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">選択</button>
                    </form>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
