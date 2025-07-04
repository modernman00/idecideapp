@extends('base')

@section('title', $blog->title . ' - iDecide')

@push('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta property="og:image" content="{{ $_ENV['APP_URL'] }}/public/images/blog/{{ $blog->blogImg }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="iDecide Decision Matrix">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta name="twitter:image" content="{{ $_ENV['APP_URL'] }}/public/images/blog/{{ $blog->blogImg }}">
    <meta name="twitter:site" content="@iDecide">
@endpush

@section('content')
    <div class="container my-5">
        <h1 class="mb-3">{{ $blog->title }}</h1>
        <p class="text-muted">{{ dateFormat($blog->created_at) }}</p>
        <img src="{{ $_ENV['APP_URL'] }}/public/images/blog/{{ $blog->blogImg }}" class="img-fluid mb-4" alt="{{ $blog->title }}">
        <div>{!! nl2br(e($blog->content)) !!}</div>

        <div class="d-flex flex-wrap gap-2 mt-4">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" class="btn btn-primary" target="_blank">Facebook</a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}&via=iDecide" class="btn btn-info" target="_blank">Twitter</a>
            <a href="https://wa.me/?text=Check out this post on iDecide! {{ urlencode(url()->current()) }}" class="btn btn-success" target="_blank">WhatsApp</a>
            <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(url()->current()) }}&title={{ urlencode($blog->title) }}" class="btn btn-dark" target="_blank">LinkedIn</a>
            <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&media={{ urlencode($_ENV['APP_URL'] . "/public/images/blog/" . $blog->blogImg) }}&description={{ urlencode($blog->title) }}" class="btn btn-danger" target="_blank">Pinterest</a>
        </div>
    </div>
@endsection
