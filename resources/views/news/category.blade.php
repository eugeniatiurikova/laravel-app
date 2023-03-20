@extends('layouts.main')
@section('content')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <h1 class="display-4 font-italic">Categories of news</h1>
    </div>
    <div class="row">
        @forelse($newsList as $key => $news)
            <div class="col-lg-4">
                <h3 class="mb-0"><a href="{{ route('category',['catId' => $key]) }}"> {{$news['title']}}</a></h3>
                <div class="mb-1 text-muted">{{ $news['created_at'] }}</div>
                <p>{!! $news['description'] !!}</p>
                <br><br>
            </div>
        @empty
            <h2>No news today</h2>
        @endforelse
    </div>
@endsection

