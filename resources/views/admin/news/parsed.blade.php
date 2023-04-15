@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Parsed News</h1>
{{--        <div class="btn-toolbar mb-2 mb-md-0">--}}
{{--            <a href="{{ route('admin.news.index', ['select' => 'published']) }}" class="btn btn-sm btn-outline-secondary me-2">Published</a>--}}
{{--            <a href="{{ route('admin.news.index', ['select' => 'visible']) }}" class="btn btn-sm btn-outline-secondary me-2">Visible</a>--}}
{{--            <a href="{{ route('admin.news.index', ['select' => 'disabled']) }}" class="btn btn-sm btn-outline-secondary me-2">Unactive</a>--}}
{{--            <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-primary me-2">Add new</a>--}}
{{--        </div>--}}
    </div>
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
                    <td>{{$news['description']}}</td>
                    <td>{{$news['pubDate']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{$newsList->appends($_GET)->links()}}--}}
    </div>
@endsection

