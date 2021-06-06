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
                            <input type="hidden" name="book_img" value="{{ $book->book_img}}">
                            <img src="{{$book->book_img}}">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="book_title" value="{{ $book->book_title}}">
                            タイトル：{{$book->book_title}}
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="book_detail" value="{{ $book->book_detail}}">
                            概要：{{$book->book_detail}}
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="book_author" value="{{ $book->book_author}}">
                            著者：{{$book->book_author}}
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="book_publishedDate" value="{{ $book->book_publishedDate}}">
                            出版日：{{$book->book_publishedDate}}
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
