@extends('thing.layout')

@section('title', 'ポートフォリオ')

@section('content')
    @auth
    <section class="container my-5">
        <div class="card">
            <div class="card-header">
                <a href="#collapsed-form" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapsed-form">
                    ポートフォリオを追加
                </a>
            </div>
            <div class="collapse" id="collapsed-form">
                <div class="card-body">
                    @component('thing._form', ['method' => 'post', 'action' => route('thing.store')])
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">追加</button>
                            </div>
                        </div>
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
    @endauth

    <section class="container my-5">
        <div class="row">
            <div class="col-sm-12 mb-4">
                @include('thing._searchbar')
            </div>
            @each('thing._card', $things, 'thing')
        </div>
    </section>
@endsection
