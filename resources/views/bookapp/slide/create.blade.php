@extends('bookapp.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">新規投稿</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST"  action="{{ route('bookapp.slide.store') }}" enctype="multipart/form-data">
                    @csrf


                        <div class="mb-3">
                            <label for="formFile" class="form-label">PPTのPDF(必須)</label>
                            <input class="form-control {{ $errors->has('slides_pdf') ? 'is-invalid' : '' }}" type="file" id="formFile" name="slides_pdf">
                            @error('slides_pdf')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">学んだこと</label>
                            <textarea type="text" name="book_output" class="form-control {{ $errors->has('book_output.max') ? 'is-invalid' : '' }}"></textarea>
                            <div  class="form-text">本について学んだことを記入してください</div>
                            @error('book_output.max')
                                <div class="invalid-feedback">500文字以内におさめてください。</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">タグ</label>
                            @foreach($tags as $tag)
                                <div class="form-check">
                                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <p>---------------以下自動取得--------------</p>
                        </div>
                        <div class="mb-3">
                            <img src="{{$book->book_img}}">
                            <input type="hidden" name="book_img" value="{{ $book->book_img}}">
                            <br>
                            <label for="formFile" class="form-label">書籍画像ない場合または変更したい場合はアップロードしてください</label>
                            <input class="form-control" type="file" id="formFile" name="upload_book_img">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">タイトル</label>
                            <input class="form-control" value="{{ $book->book_title}}" type="text" name="book_title">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">概要</label>
                            <input class="form-control" value="{{ $book->book_detail}}" type="text" name="book_detail">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">著者</label>
                            <input class="form-control" value="{{ $book->book_author}}" type="text" name="book_author">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">出版日</label>
                            <input class="form-control" value="{{ $book->book_publishedDate}}" type="text" name="book_publishedDate">
                        </div>
                        <input class="float-right btn btn-primary" type="submit" value="登録する">
                    </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
