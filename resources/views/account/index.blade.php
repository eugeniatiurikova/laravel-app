@extends('layouts.app')
@section('content')
    <h2>Welcome, {{Auth::user()->name}}</h2><br>
    @if(Auth::user()->avatar) <img src="{{Auth::user()->avatar}}" width="200px">
    @endif
@endsection
