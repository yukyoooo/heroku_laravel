@extends('layouts.app')

@section('content')
トップページ
<div class="container">
    <div class="row justify-content-center">

        @foreach($slides as $slide)
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <tr>
                            <th scope="row">{{ $slide->id }}</th>
                            <td> {{ $slide->book_title }}</td>
                            <td>{{ $slide->book_detail }}</td>
                            <td>{{ $slide->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
        {{ $slides->links() }}
    </div>
</div>
@endsection
