@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome to admin</h1>
{{--        <div class="btn-toolbar mb-2 mb-md-0">--}}
{{--            <button class="btn btn-sm btn-outline-secondary me-2">Add new</button>--}}
{{--            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">--}}
{{--                <span data-feather="calendar" class="align-text-bottom"></span>--}}
{{--                This week--}}
{{--            </button>--}}
{{--        </div>--}}
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4>Latest news</h4>
        <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-primary me-2">Add new</a>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Categories</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Visible</th>
                <th scope="col">Updated at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($newsList as $news)
                <tr>
                    <td>{{$news->id}}</td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->categories->pluck('title')->implode(', ')}}</td>
                    <td>{{$news->author}}</td>
                    <td>{{$news->status}}</td>
                    <td>{{$news->isVisible}}</td>
                    <td>{{$news->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary me-2">Add new category</a>
        <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary me-2">Add new source</a>
    </div>
{{--    @php $message = "Some message"; @endphp--}}
{{--    <x-alert type="danger" :message="$message"></x-alert>--}}
{{--    <x-alert type="success" :message="$message"></x-alert>--}}
{{--    <x-alert type="info" :message="$message"></x-alert>--}}
{{--    <x-alert type="warning" :message="$message"></x-alert>--}}
@endsection
