@extends('layouts.main')
@section('content')
<h1 class="fw-light">{{ $newsList[0]->category_title }}</h1><br>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @forelse($newsList as $news)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ $news->image }}" alt="{{ $news->title }}" width="100%" height="225">
                <div class="card-body">
                    <p class="card-text">
                    <b class="mb-0">
                        @if($loop->first)<span style="color:red">Hot! </span>@endif
                        <a class="text-dark" href="{{ route('show', ['catId' => $news->category_id, 'id' => $news->id]) }}">{{ $news->title }}</a>
                        </b><br>{!! $news->description !!}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div><small class="text-primary"><a href="{{ route('category', ['catId' => $news->category_id]) }}">{{ $news->category_title }}</a></small><br>
                        <small class="text-muted">{{ $news->created_at->format('Y-m-d') }} | {{ $news->author }}</small></div>
                        <a class="btn btn-outline-secondary" href="{{ route('show', ['id' => $news->id, 'catId' => $news->category_id]) }}" role="button">→</a>
                    </div>
                </div>
            </div>
        </div>
@empty
        <h2>No news today</h2>
@endforelse
</div>
@endsection

