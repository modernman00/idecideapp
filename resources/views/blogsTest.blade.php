@extends('base')

@section('title', 'Blog Post')

@section('content')
<div class="container">
    <article class="blog-post">
        @if(isset($title))
            <h1>{{ $title }}</h1>
        @else
            <h1>Blog Post</h1>
        @endif
        
        @if(isset($content))
            <div class="blog-content">
                {!! $content !!}
            </div>
        @endif
        
        @if(isset($author))
            <div class="blog-meta">
                <p><strong>Author:</strong> {{ $author }}</p>
            </div>
        @endif
        
        @if(isset($published_at))
            <div class="blog-meta">
                <p><strong>Published:</strong> {{ $published_at }}</p>
            </div>
        @endif
    </article>
    
    <div class="mt-4">
        <a href="/blogs" class="btn btn-secondary">← Back to Blog List</a>
    </div>
</div>
@endsection
