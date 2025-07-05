@extends('base')

@section('title', $blog['title'])

@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $blog['title'] }}">
    <meta property="og:description" content="{{ substr(strip_tags($blog['content']), 0, 150) }}">
    <meta property="og:image" content="{{ $_ENV['APP_URL'] }}/public/images/blog/{{ $blog['blogImg'] }}">
    <meta property="og:url" content="{{ $_ENV['APP_URL'] }}/blogs/{{ $blog['id'] }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog['title'] }}">
    <meta name="twitter:description" content="{{ substr(strip_tags($blog['content']), 0, 150) }}">
    <meta name="twitter:image" content="{{ $_ENV['APP_URL'] }}/public/images/blog/{{ $blog['blogImg'] }}">
@endsection

@section('content')
<div class="container my-5">
    <h1>{{ $blog['title'] }}</h1>
    <img src="{{ $_ENV['APP_URL'] }}/public/images/blog/{{ $blog['blogImg'] }}" class="img-fluid mb-4" alt="{{ $blog['title'] }}">
    <p>{{ $blog['content'] }}</p>
        <!-- ShareThis inline buttons for this blog post -->
    <div class="sharethis-inline-share-buttons"></div>

</div>

@push('scripts_sharethis')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6869340ddc404f0019fb1253&product=sop' async='async'></script>
@endpush

@endsection
