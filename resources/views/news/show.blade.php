@extends('layouts.main')
@section('content')
    <div class="jumbotron p-3 p-md-5 rounded bg-light">
        <h1 class="display-4 font-italic">{{ $news->title }}</h1>
        <p class="lead my-3 text-primary">Category: <a href="{{ route('category',['catId' => $news->category_id]) }}">{{ $news->category_title }}</a></p>
    </div>

    <div class="blog-post">
        <p>&nbsp;</p>
        <img src="{{ $news->image }}" alt="{{ $news->title }}" style="width: 400px; height: 250px;">
        <p>&nbsp;</p>
        <p>{!! $news->description !!}</p>
        <p class="blog-post-meta">{{ $news->created_at }} by <a href="#">{{ $news->author }}</a></p>
        <a href="{{ route('news') }}">← Back to news categories</a>
    </div>

@endsection

