@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">News</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.news.index') }}" class="btn btn-sm me-2 @if(!$select) btn-outline-primary @else btn-outline-secondary @endif">All</a>
            <a href="{{ route('admin.news.index', ['select' => 'published']) }}" class="btn btn-sm me-2 @if($select === 'published') btn-outline-primary @else btn-outline-secondary @endif">Published</a>
            <a href="{{ route('admin.news.index', ['select' => 'visible']) }}" class="btn btn-sm me-2 @if($select === 'visible') btn-outline-primary @else btn-outline-secondary @endif">Visible</a>
            <a href="{{ route('admin.news.index', ['select' => 'disabled']) }}" class="btn btn-sm @if($select === 'disabled') btn-outline-primary @else btn-outline-secondary @endif me-2">Unactive</a>
            <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-primary me-2">Add new</a>
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Categories</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Visible</th>
                <th scope="col">Updated at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($newsList as $news)
                <tr>
                    <td>{{$news->id}}</td>
                    <td><img src="{{$news->image}}" width="50px"></td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->categories->pluck('title')->implode(', ')}}</td>
                    <td>{{$news->author}}</td>
                    <td>{{$news->status}}</td>
                    <td>{{$news->isVisible}}</td>
                    <td>{{$news->updated_at}}</td>
                    <td><a href="{{ route('admin.news.edit',['news' => $news]) }}">Edit</a>&nbsp;|&nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $news->id }}" path="admin/news">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$newsList->appends($_GET)->links()}}
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/delete.js') }}" ></script>
@endpush
