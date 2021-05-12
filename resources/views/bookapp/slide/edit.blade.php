@extends('bookapp.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">投稿修正</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('bookapp.slide.update', ['id' => $slide->id ]) }}"enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">書籍画像</label>
                            <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" id="formFile" name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">PPTのPDF</label>
                            <input class="form-control" type="file" id="formFile" name="slides_pdf">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">現在の写真</label><br>
                            <img src="{{ $slide->image_path }}" width="60">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">本のタイトル</label>
                            <input type="text" name="book_title" class="form-control {{ $errors->has('book_title') ? 'is-invalid' : '' }}" value="{{ $slide->book_title }}">
                            @error('book_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">紹介文</label>
                            <textarea type="text" rows="5" name="book_detail" class="form-control {{ $errors->has('book_detail.max') ? 'is-invalid' : '' }}">{{ $slide->book_detail }}</textarea>
                            @error('book_detail.max')
                                <div class="invalid-feedback">500文字以内におさめてください。</div>
                            @enderror
                        </div>
                        <input class="float-right btn btn-primary" type="submit" value="修正">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
