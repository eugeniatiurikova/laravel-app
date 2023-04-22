@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add news</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-secondary me-2">Back</a>
        </div>
    </div>
    <div class="col-md-7 col-lg-8">
        @include('inc.message')

        <form class="needs-validation" novalidate method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-12">
                    <label for="title" class="form-label" @error('title') style="color:red" @enderror>News title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    <div class="invalid-feedback">
                        News title is required
                    </div>
                </div>
                <div class="col-8">
                    <label for="author" class="form-label" @error('author') style="color:red" @enderror>Author</label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
                    <div class="invalid-feedback">
                        Author username is required
                    </div>
                </div>
                <div class="col-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status">
                        @foreach ($statuses as $status)
                            <option value="{{$status}}" @if(old('status') === $status) selected @endif>{{$status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label for="image" class="form-label" @error('image') style="color:red" @enderror>Image</label>
                    <input type="file" class="form-control" name="image" id="image" value="{{ old('image') }}">
                    <div class="invalid-feedback">
                        News title is required
                    </div>
                </div>
                <div class="col-8">
                    <label for="description" class="form-label" @error('description') style="color:red" @enderror>News text</label>
                    <textarea style="height: 300px" class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                    <div class="invalid-feedback">
                        New category description
                    </div>
                </div>
                <div class="col-4">
                    <label for="categories" class="form-label" @error('categories') style="color:red" @enderror>Categories</label>
                    <select class="form-control" style="height: 340px" name="categories[]" id="categories" multiple>
                        @foreach ($categoryList as $category)
                            <option value="{{$category->id}}" @if(old('categories') === $category->id) selected @endif>{{$category->title}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Category is required
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Add news</button>
        </form>
        <p>&nbsp;</p>
    </div>
@endsection
<style>
    .ck.ck-content:not(.ck-comment__input *) {
        height: 300px;
        overflow-y: auto;
    }
</style>
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
