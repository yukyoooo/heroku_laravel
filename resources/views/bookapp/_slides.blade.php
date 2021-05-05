@foreach($slides as $slide)
<div class="col-4">
  <img src="http://placehold.jp/300x200.png" class="card-img-top" alt="...">
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ $slide->image_path }}" alt="{{ $slide->book_title }}" width="100%" style="margin:10px; box-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $slide->book_title }}</h5>
                <p class="card-text">{{ $slide->book_detail }}</p>
                <p class="card-text"><small class="text-muted">{{ $slide->created_at }}<br>{{ $slide->user->name }}</small><a class="btn float-right btn-sm btn-primary" href="{{ route('bookapp.slide.show', ['id' => $slide->id ]) }}" role="button">詳細を見る</a></p>

            </div>
        </div>
        </div>
    </div>
</div>




@endforeach

<!-- <div class="col-md-4 col-12">
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                <tr>
                    bookimg: <img src="{{ $slide->image_path }}"width="60">
                    title: <td> {{ $slide->book_title }}</td><br>
                    details: <td>{{ $slide->book_detail }}</td><br>
                    created_at: <td>{{ $slide->created_at }}</td><br>
                    @isset($slide->user->name)
                        author: <td>{{ $slide->user->name }}</td><br>
                    @endisset
                    <td><a href="{{ route('bookapp.slide.show', ['id' => $slide->id ]) }}">詳細</a></td>
                </tr>
            </table>
        </div>
    </div>
</div> -->
