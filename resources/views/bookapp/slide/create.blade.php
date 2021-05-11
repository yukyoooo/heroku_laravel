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
                            <label for="formFile" class="form-label">書籍画像</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">PPTのPDF</label>
                            <input class="form-control" type="file" id="formFile" name="slides_pdf">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">本のタイトル</label>
                            <input type="text" name="book_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">紹介文</label>
                            <textarea type="text" name="book_detail" class="form-control"></textarea>
                            <div  class="form-text">本について概要や感想、紹介文を記入してください</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">作成者:{{ $member->name }}</label>
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
