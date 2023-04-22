@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add user</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary me-2">Back</a>
        </div>
    </div>
    <div class="col-md-7 col-lg-8">
        @include('inc.message')
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-12">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" type="submit">{{ __('Register') }}</button>
            </div>
        </form>

{{--        <form class="needs-validation" novalidate method="post" action="{{ route('admin.users.store') }}">--}}
{{--            @csrf--}}
{{--            <div class="row g-3">--}}
{{--                <div class="col-12">--}}
{{--                    <label for="title" class="form-label">New category title</label>--}}
{{--                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        New category title is required--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12">--}}
{{--                    <label for="description" class="form-label">New category description</label>--}}
{{--                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        New category description--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <hr class="my-4">--}}
{{--            <button class="w-100 btn btn-primary btn-lg" type="submit">Add new category</button>--}}
{{--        </form>--}}
    </div>
@endsection
