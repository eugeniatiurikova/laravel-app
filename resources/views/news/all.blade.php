@extends('layouts.main')
@section('content')
    <h1 class="fw-light">All news</h1><br>
    <div class="row row-cols-1 row-cols-sm-->2 row-cols-md-3 g-3">
        @forelse($newsList as $news)
            <div class="col">
                <div class="card shadow-sm">
                    <img width="100%" height="225" style="background-image: url('{{ $news->image }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                ">
                    <div class="card-body">
                        <p class="card-text">
                            <b class="mb-0">@if($loop->first)<span style="color:red">Hot! </span>@endif
                                <a class="text-dark" href="{{ route('show', ['catId' => $news->categories[0]->id, 'id' => $news->id]) }}">{{ $news->title }}</a>
                            </b><br>{!! mb_substr($news->description,0,80) !!}
                            <p>@foreach($news->categories as $category)
                                    <a href="{{ route('category',['catId' => $category->id]) }}">{{ $category->title }}</a>
                                    @if(!($loop->last))<span class="text-muted">&nbsp;|&nbsp;</span>@endif
                                @endforeach</p>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted">Author: {{ $news->author }}<br>{{ $news->created_at->format('Y-m-d') }}</small>
                            </div>
                            <a class="btn btn-outline-secondary" href="{{ route('show', ['id' => $news->id, 'catId' => $news->categories[0]->id]) }}" role="button">→</a>
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
