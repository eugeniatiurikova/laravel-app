@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Parsed News</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ $link }}" class="btn btn-sm btn-outline-secondary me-2">View link</a>
            <form id="parse-form" action="{{ route('admin.parser.store',['link' => $link]) }}" method="POST" class="d-none">
                @csrf
            </form>
            <a class="btn btn-sm btn-primary me-2"
               href="{{ route('admin.parser.store',['link' => $link]) }}"
               onclick="event.preventDefault(); document.getElementById('parse-form').submit();">Add to database
            </a>
        </div>
    </div>
    @if($newsList)
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($newsList['news'] as $news)
                <tr>
                    <td>{{$news['title']}}</td>
                    <td>{{$newsList['title']}}</td>
                    <td>{!! $news['description'] !!}</td>
                    <td>{{$news['pubDate']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{$newsList->appends($_GET)->links()}}--}}
    </div>
    @else
        <p>No links to parse</p>
    @endif
@endsection

