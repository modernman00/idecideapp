@extends('base')
@section('title', '500 Internal Server Error')
@section('content')
    <h1>500</h1>
    <p>Uh-oh! Something went wrong on our end.</p>
    <p>If the problem persists, please contact support or try again later.</p>
    <a href="{{ url('/') }}">Go back to homepage</a>
@endsection
