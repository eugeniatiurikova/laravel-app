@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-secondary me-2">Add new</a>
{{--            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">--}}
{{--                <span data-feather="calendar" class="align-text-bottom"></span>--}}
{{--                This week--}}
{{--            </button>--}}
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.message')

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Last login</th>
                <th scope="col">Admin</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usersList as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>{{$item->last_login_at}}</td>
                    <td>{{($item->is_admin) ? 'yes' : 'no'}}</td>
                    <td><a href="{{ route('admin.users.edit',['user' => $item->id]) }}">Edit</a>&nbsp;|&nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $item->id }}" path="admin/users">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$usersList->links()}}
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/delete.js') }}" ></script>
@endpush
