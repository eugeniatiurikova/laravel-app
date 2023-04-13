@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">News</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.news.index', ['select' => 'published']) }}" class="btn btn-sm btn-outline-secondary me-2">Published</a>
            <a href="{{ route('admin.news.index', ['select' => 'visible']) }}" class="btn btn-sm btn-outline-secondary me-2">Visible</a>
            <a href="{{ route('admin.news.index', ['select' => 'disabled']) }}" class="btn btn-sm btn-outline-secondary me-2">Unactive</a>
            <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-primary me-2">Add new</a>
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
                <th scope="col">#</th>
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
                    <td>{{$news->title}}</td>
                    <td>{{$news->categories->pluck('title')->implode(', ')}}</td>
                    <td>{{$news->author}}</td>
                    <td>{{$news->status}}</td>
                    <td>{{$news->isVisible}}</td>
                    <td>{{$news->updated_at}}</td>
                    <td><a href="{{ route('admin.news.edit',['news' => $news]) }}">Edit</a>&nbsp;|&nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $news->id }}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$newsList->appends($_GET)->links()}}
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
           let elements = document.querySelectorAll('.delete');
           elements.forEach(function(e,i) {
              e.addEventListener('click', function() {
                  const id = this.getAttribute('rel');
                    if(confirm('Are you sure?')) {
                        sendData(`/admin/news/${id}`).then(() => {
                            location.reload()
                        })
                    } else {
                        alert("Delete cancelled")
                    }
               })
            })
        });

        async function sendData(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
