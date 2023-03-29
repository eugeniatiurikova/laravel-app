@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sources</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary me-2">Add new</a>
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.message')

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Url</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sourcesList as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>
                    <td><a href="{{$item->url}}">{{$item->url}}</a></td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td><a href="{{ route('admin.sources.edit',['source' => $item->id]) }}">Edit</a> | <a href="">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
