@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add source</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.sources.index') }}" class="btn btn-sm btn-outline-secondary me-2">Back</a>
        </div>
    </div>
    <div class="col-md-7 col-lg-8">
        @include('inc.message')

        <form class="needs-validation" novalidate method="post" action="{{ route('admin.sources.store') }}">
            @csrf
            <div class="row g-3">
                <div class="col-6">
                    <label for="name" class="form-label">User's name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                    <div class="invalid-feedback">
                        User's name is required
                    </div>
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                    <div class="invalid-feedback">
                        Email is required
                    </div>
                </div>
                <div class="col-12">
                    <label for="url" class="form-label">Source url</label>
                    <input type="url" class="form-control" name="url" id="url" value="{{ old('url') }}" required>
                    <div class="invalid-feedback">
                        Email is required
                    </div>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">New source description</label>
                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                </div>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Add new source</button>
        </form>
    </div>
@endsection
