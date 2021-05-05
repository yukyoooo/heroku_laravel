@extends('bookapp.layout')

@section('content')
　Todo:<br>
　　[　]パワポを画像に変換する処理<br>
　　[　]パワポアップロード追加<br>
　　[　]全体的なデザイン<br>
　　[　]バグ：タイトルや文章修正してアップロードすると画像なしで登録される<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    スライド登録ページ


                    <form method="POST"  action="{{ route('bookapp.slide.store') }}" enctype="multipart/form-data">
                    @csrf
                        <!-- アップロードフォームの作成 -->
                        <input type="file" name="image">
                        タイトル
                        <input type="text" name="book_title">
                        <br>
                        紹介内容
                        <textarea name="book_detail"></textarea>
                        <br>
                        作成者
                        {{ $member->name }}
                        <br>
                        <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
