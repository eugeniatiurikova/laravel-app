@extends('layouts.main')
@section('content')
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <h1 class="display-4 font-italic">{{ $newsList[1]['category'] }}</h1>
    <p class="lead my-3">All news in category</p>
</div>

{{--<div class="row mb-2">--}}
<div class="row">
    @forelse($newsList as $news)
<div class="col-lg-4">
    <p><img src="{{ $news['image'] }}" alt="{{ $news['title'] }}" width="140" height="140"></p>
    <p class="d-inline-block mb-2 text-primary">{{ $news['category'] }}</p>
    <h3 class="mb-0">@if($loop->first)
            <span style="color:red">Hot! </span>
            @endif
        <a class="text-dark" href="{{ route('show', ['catId' => 1, 'id' => $news['id']]) }}">{{ $news['title'] }}</a></h3>
    <div class="mb-1 text-muted">{{ $news['created_at'] }} | {{ $news['author'] }}</div>
    <p>{!! $news['description'] !!}</p>
    <p><a class="btn btn-outline-secondary" href="{{ route('show', ['catId' => 1, 'id' => $news['id']]) }}" role="button">View details »</a></p>
    <br><br>
</div>

@empty
        <h2>No news today</h2>
@endforelse
</div>
@endsection

