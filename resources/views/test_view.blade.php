@extends('base')

@section('title', 'Test View')

@section('content')
<div class="container mt-4">
    <h1>Test View</h1>
    <p>This is a test view template used for unit testing purposes.</p>
    
    @if(isset($testData))
        <div class="alert alert-info">
            <h4>Test Data:</h4>
            <pre>{{ json_encode($testData, JSON_PRETTY_PRINT) }}</pre>
        </div>
    @endif
    
    @if(isset($key))
        <p><strong>Key:</strong> {{ $key }}</p>
    @endif
    
    @if(isset($number))
        <p><strong>Number:</strong> {{ $number }}</p>
    @endif
</div>
@endsection
