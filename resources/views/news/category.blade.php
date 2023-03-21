@extends('layouts.main')
@section('content')
    <h1 class="fw-light">Categories of news</h1><br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($newsList as $key => $news)

            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="card-text">
                            <b class="mb-0">
                                <a href="{{ route('category',['catId' => $key]) }}"> {{$news['title']}}</a>
                            </b><br>{!! $news['description'] !!}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $news['created_at']->format('Y-m-d') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>No news today</h2>
        @endforelse
    </div>
@endsection

