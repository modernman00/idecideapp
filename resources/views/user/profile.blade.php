@extends('base')

@section('title', 'User Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>User Profile</h3>
                </div>
                <div class="card-body">
                    @if(isset($user))
                        <div class="row mb-3">
                            <div class="col-sm-3"><strong>Name:</strong></div>
                            <div class="col-sm-9">{{ $user['name'] ?? 'N/A' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"><strong>Email:</strong></div>
                            <div class="col-sm-9">{{ $user['email'] ?? 'N/A' }}</div>
                        </div>
                        @if(isset($user['id']))
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>User ID:</strong></div>
                                <div class="col-sm-9">{{ $user['id'] }}</div>
                            </div>
                        @endif
                        @if(isset($user['settings']))
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Settings:</strong></div>
                                <div class="col-sm-9">
                                    <pre>{{ json_encode($user['settings'], JSON_PRETTY_PRINT) }}</pre>
                                </div>
                            </div>
                        @endif
                    @else
                        <p>No user data available.</p>
                    @endif
                    
                    <div class="mt-4">
                        <a href="/" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
