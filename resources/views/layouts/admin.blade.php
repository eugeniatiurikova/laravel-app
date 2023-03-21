<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard Template · Bootstrap v5.3</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
<x-admin.header />
<div class="container-fluid">
    <div class="row">
        <x-admin.sidebar />
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" ></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" ></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
</html>
