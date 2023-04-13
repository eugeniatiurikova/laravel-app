@extends('layouts.app')
@section('content')
    <h2>Welcome, {{Auth::user()->name}}</h2>
    @if(Auth::user()->is_admin)
    <p><a href="{{ route('admin.index') }}">To admin</a></p>
    @endif
@endsection
