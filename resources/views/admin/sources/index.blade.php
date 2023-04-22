@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sources</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary me-2">Add new</a>
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.message')

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">User</th>
                <th scope="col">Url</th>
                <th scope="col">Updated at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sourcesList as $item)
                <tr>
                    <td><a href="mailto:{{$item->email}}">{{$item->name}}</a></td>
                    <td><a href="{{$item->url}}" target="top">{{$item->url}}</a></td>
                    <td>{{$item->updated_at}}</td>
                    <td><a href="{{ route('admin.sources.edit',['source' => $item->id]) }}">Edit</a>&nbsp;|&nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $item->id }}" path="admin/sources">Delete</a>&nbsp;|&nbsp;
                        <a href="{{ route('admin.parser.create',['link' => $item->url]) }}">Create file</a>&nbsp;|&nbsp;
                        <a href="{{ route('admin.parser.index',['link' => $item->url]) }}">Preview</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$sourcesList->appends($_GET)->links()}}
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/delete.js') }}" ></script>
@endpush
