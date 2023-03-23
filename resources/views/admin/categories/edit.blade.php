@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-secondary me-2">Back</a>
        </div>
    </div>
    <div class="col-md-7 col-lg-8">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="warning" :message="$error"></x-alert>
            @endforeach
        @endif
        <form class="needs-validation" novalidate method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="title" class="form-label">New category title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    <div class="invalid-feedback">
                        New category title is required
                    </div>
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">New category description</label>
                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                    <div class="invalid-feedback">
                        New category description
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Save category</button>
        </form>
    </div>
@endsection
