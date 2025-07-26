@extends('base')
@section('title', '500 Internal Server Error')
@section('content')
    <h1>404</h1>
    <p>Oops! The page you're looking for doesn't exist.</p>
    <a href="{{ url('/') }}">Return to Home</a>
@endsection
