@extends('layouts.main')
@section('content')
    <div class="jumbotron p-3 p-md-5 rounded bg-light">
        <h1 class="display-4 font-italic">{{ $news->title }}</h1>
        <p class="lead my-3 text-primary">
        @foreach($news->categories as $category)
                <a href="{{ route('category',['catId' => $category->id]) }}">{{ $category->title }}</a>&nbsp;
        @endforeach</p>
    </div>

    <div class="blog-post">
        <p>&nbsp;</p>
        <img src="{{ $news->image }}" alt="{{ $news->title }}" style="width: 400px;">
        <p>&nbsp;</p>
        {!! $news->description !!}
        <p class="blog-post-meta">{{ $news->created_at }} by {{ $news->author }}</p>
        <a href="{{ route('news') }}">← Back to news categories</a>
    </div>

@endsection

