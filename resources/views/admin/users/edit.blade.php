@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit user</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary me-2">Back</a>
        </div>
    </div>
    <div class="col-md-7 col-lg-8">
        @include('inc.message')

        <form class="needs-validation" novalidate method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="row g-3">
                @if ($user->avatar)
                    <div class="col-2"><img src="{{ $user->avatar }}" width="100%"></div>
                @endif
                <div class="@if($user->avatar) col-10 @else col-12 @endif">
                    <label for="name" class="form-label">User name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    <div class="invalid-feedback">
                        User name is required
                    </div>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                    <div class="invalid-feedback">
                        Email is required
                    </div>
                </div>
                <div class="col-12">
                    <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin"
                           @if($user->is_admin === true) checked @endif>
                    <label class="form-check-label" for="is_admin">Admin rights</label>
                </div>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Save user</button>
        </form>
    </div>
@endsection
