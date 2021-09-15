import React from 'react';

const BookForm = () => {
    return (
        <div>
            <div className="input-group mb-3">
                    <span className="input-group-text" id="inputGroup-sizing-default">書籍名</span>
                    {/* <input type="text" class="form-control" name="keyword" aria-label="Sizing example input" value="{{ $books['keyword'] }}" aria-describedby="inputGroup-sizing-default"> */}
                    <button className="btn btn-outline-secondary" type="submit" id="button-addon2">検索する</button>
            </div>
            {/* <form action="{{ route('bookapp.slide.selectBook') }}" method="get" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">書籍名</span>
                    <input type="text" class="form-control" name="keyword" aria-label="Sizing example input" value="{{ $books['keyword'] }}" aria-describedby="inputGroup-sizing-default">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">検索する</button>
                </div>
            </form> */}


                <p style={{height:330}}>書籍名を入力してください。</p>
            {/* @if ($books['items'] == null)
                <p style="height:330px;">書籍名を入力してください。</p>
            @else (count($books['items']) > 0)
                <p>「{{ $books['keyword'] }}」の検索結果です。読んだ本を選択してください</p>
                <div class="row ">
                    @foreach ($books['items'] as $item)
                    @if (array_key_exists('imageLinks', $item['volumeInfo']))
                    <div class="col-2 selectbooks" style="margin-top:30px;">
                        <form action="{{ route('bookapp.slide.create') }}" method="get" >
                            <button class="" type="submit" id="button-addon2">
                                <img src="{{ $item['volumeInfo']['imageLinks']['thumbnail']}}"><br>
                                <input type="hidden" name="book_img" value="{{$item['volumeInfo']['imageLinks']['thumbnail']}}">
                                @if (array_key_exists('publishedDate', $item['volumeInfo']))
                                    <input type="hidden" name="book_publishedDate" value="{{ $item['volumeInfo']['publishedDate'] }}">
                                @endif
                                @if (array_key_exists('description', $item['volumeInfo']))
                                    <input type="hidden" name="book_detail" value="{{$item['volumeInfo']['description']}}">
                                @endif
                                @if (array_key_exists('authors', $item['volumeInfo']))
                                    <input type="hidden" name="book_author" value="{{$item['volumeInfo']['authors'][0]}}">
                                @endif
                                    <input type="hidden" name="book_title" value="{{$item['volumeInfo']['title']}}">
                            </button>
                        </form>
                    </div>
                    @endif
                    @endforeach
                    <div class="col-2 selectbooks" style="margin-top:30px;">
                        <form action="{{ route('bookapp.slide.create') }}" method="get" >
                            <button class="" type="submit" id="button-addon2">
                                <div class="card no-result">
                                    <div class="card-body">
                                        <p class="card-title">本が見つからない場合はこちらから直接登録できます。</ｐ>
                                        <input type="hidden" name="no-result" value="no-result">
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            @endif */}
        </div>
    )
}

export default BookForm;
