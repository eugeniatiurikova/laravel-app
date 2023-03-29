@extends('layouts.main')
@section('content')
<h1 class="fw-light">{{ $category->title }}</h1><br>
<div class="row row-cols-1 row-cols-sm-->2 row-cols-md-3 g-3">
    @forelse($category->news as $news)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ $news->image }}" alt="{{ $news->title }}" width="100%" height="225">
                <div class="card-body">
                    <p class="card-text">
                    <b class="mb-0">
                        @if($loop->first)<span style="color:red">Hot! </span>@endif
                        <a class="text-dark" href="{{ route('show', ['catId' => $category->id, 'id' => $news->id]) }}">{{ $news->title }}</a>
                        </b><br>{!! $news->description !!}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div><small class="text-primary">Author: {{ $news->author }}</small><br>
                        <small class="text-muted">{{ $news->created_at->format('Y-m-d') }}</small></div>
                        <a class="btn btn-outline-secondary" href="{{ route('show', ['id' => $news->id, 'catId' => $category->id]) }}" role="button">→</a>
                    </div>
                </div>
            </div>
        </div>
@empty
        <h2>No news today</h2>
@endforelse
</div>
@endsection
