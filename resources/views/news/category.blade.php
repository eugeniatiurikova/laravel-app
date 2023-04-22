@extends('layouts.main')
@section('content')
    <h1 class="fw-light">Categories of news</h1><br>
    <p><a href="{{ route('all') }}">All news →</a></p>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($newsList as $news)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="card-text">
                            <b class="mb-0">
                                <a href="{{ route('category',['catId' => $news->id]) }}"> {{$news->title}}</a>
                            </b><br>{!! mb_substr($news->description,0,80) !!}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $news->created_at->format('Y-m-d') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>No news today</h2>
        @endforelse
    </div>
    <p>&nbsp;</p><hr>
    {{$newsList->links()}}
@endsection

