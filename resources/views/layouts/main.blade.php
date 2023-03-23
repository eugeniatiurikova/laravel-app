<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Album example · Bootstrap v5.3</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('assets/css/carousel.css') }}" rel="stylesheet">--}}
</head>

<body>
<div class="container">
{{--    @php $category = $newsList[1]['category']; @endphp--}}
    <x-header></x-header>
    @yield('content')
</div>
<p>&nbsp;</p>
<x-footer />
</body>
</html>
