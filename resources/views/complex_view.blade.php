@extends('base')

@section('title', 'Complex View')

@section('content')
<div class="container mt-4">
    <h1>Complex View</h1>
    <p>This is a complex view template used for testing complex data structures.</p>
    
    @if(isset($user))
        <div class="card mb-4">
            <div class="card-header">
                <h4>User Information</h4>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $user['id'] ?? 'N/A' }}</p>
                <p><strong>Name:</strong> {{ $user['name'] ?? 'N/A' }}</p>
                <p><strong>Email:</strong> {{ $user['email'] ?? 'N/A' }}</p>
                
                @if(isset($user['settings']))
                    <h5>Settings:</h5>
                    <ul>
                        <li><strong>Theme:</strong> {{ $user['settings']['theme'] ?? 'N/A' }}</li>
                        <li><strong>Notifications:</strong> {{ $user['settings']['notifications'] ? 'Enabled' : 'Disabled' }}</li>
                    </ul>
                @endif
            </div>
        </div>
    @endif
    
    @if(isset($posts) && is_array($posts))
        <div class="card mb-4">
            <div class="card-header">
                <h4>Posts</h4>
            </div>
            <div class="card-body">
                @foreach($posts as $post)
                    <div class="border-bottom pb-2 mb-2">
                        <p><strong>ID:</strong> {{ $post['id'] ?? 'N/A' }}</p>
                        <p><strong>Title:</strong> {{ $post['title'] ?? 'N/A' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    
    @if(isset($meta))
        <div class="card">
            <div class="card-header">
                <h4>Meta Information</h4>
            </div>
            <div class="card-body">
                <p><strong>Total:</strong> {{ $meta['total'] ?? 'N/A' }}</p>
                <p><strong>Page:</strong> {{ $meta['page'] ?? 'N/A' }}</p>
            </div>
        </div>
    @endif
    
    <div class="mt-4">
        <h5>Raw Data Dump:</h5>
        <pre class="bg-light p-3">{{ json_encode(get_defined_vars(), JSON_PRETTY_PRINT) }}</pre>
    </div>
</div>
@endsection
