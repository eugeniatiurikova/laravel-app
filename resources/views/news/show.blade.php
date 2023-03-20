@extends('layouts.main')
@section('content')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <h1 class="display-4 font-italic">{{ $news['title'] }}</h1>
        <p class="lead my-3">Category: {{ $news['category'] }}</p>
    </div>

    <div class="blog-post">
        <p class="blog-post-meta">{{ $news['created_at'] }} by <a href="#">{{ $news['author'] }}</a></p>
        <img src="{{ $news['image'] }}" alt="{{ $news['title'] }}" style="width: 400px; height: 250px;"><hr>
        <p>{!! $news['description'] !!}</p>
        <a href="{{ route('news') }}">Back to list</a>
    </div>

@endsection

