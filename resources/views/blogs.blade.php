@extends('base')

@section('title', 'iDecide Decision Matrix - Blog')

@section('content')


    <style>
        .custom-card {
            position: relative;
            overflow: hidden;
          
            /* Teal to Coral */
            border: none;
        }

        .custom-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
          
            /* Semi-transparent white overlay */
            z-index: 0;
        }

        [data-theme="dark"] .custom-card::before {
            background-color: rgba(44, 62, 80, 0.8);
            /* Dark slate blue overlay for dark mode */
        }

        .custom-card .card-body {
            position: relative;
            z-index: 1;
        }

        .btn {
            transition: all 0.2s ease-in-out;
            font-weight: 600;
        }
    </style>

    <div class="container my-5">
        <h1 class="text-center mb-4">iDecide Blog</h1>

        <!-- Image Upload Form -->
        <div class="row">
            @foreach ($blogs as $blog)
                @php
                    $postId = $blog['id'];
                    $date = dateFormat($blog['created_at']);
                @endphp


                <div class="col-12 col-md-6 col-lg-4 mb-4" id="{{ $blog['id'] }}">
                    <div class="card h-100 custom-card">
                        <img src="{{ $_ENV['APP_URL'] }}/public/images/blog/{{ $blog['blogImg'] }}" class="card-img-top"
                            alt="Decision Matrices">

                        <div class="card-body p-4">
                            <h5 class="card-title">{{ $blog['title'] }} </h5>
                            <br>
                            <h6 class="card-subtitle text-muted">{{ $date }}</h6>
                            <p class="card-text">{{ $blog['content'] }}</p>

                            <!-- ShareThis inline buttons per blog post -->
                    <div class="sharethis-inline-share-buttons" data-url="{{ $_ENV['APP_URL'] }}/blogs/{{ $postId }}"></div>
                            {{-- <div class="d-flex flex-wrap gap-2 mt-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(getenv('APP_URL') . "/blogs/$postId") }}"
                                    target="_blank" class="btn btn-primary">Facebook</a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(getenv('APP_URL') . "/blogs/$postId") }}&text=The Power of Decision Matrices - iDecide&via=iDecide"
                                    target="_blank" class="btn btn-info">Twitter</a>
                                <a href="https://wa.me/?text=Check out The Power of Decision Matrices on iDecide! {{ urlencode(getenv('APP_URL') . "/blogs/$postId") }}"
                                    target="_blank" class="btn btn-success">WhatsApp</a>
                                <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(getenv('APP_URL') . "/blogs/$postId") }}&title=The Power of Decision Matrices - iDecide"
                                    target="_blank" class="btn btn-dark">LinkedIn</a>
                                <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(getenv('APP_URL') . "/blogs/$postId") }}&media={{ urlencode(getenv('APP_URL') . '/images/blog-post-1.jpg') }}&description=The Power of Decision Matrices - iDecide"
                                    target="_blank" class="btn btn-danger">Pinterest</a>
                                <button class="btn btn-secondary copy-link"
                                    data-url="{{ getenv('APP_URL') . "/blogs/$postId" }}">Copy Link</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
          
            @endforeach
        </div>




        @include('include.returnToMain')
    </div>

    @push('scripts_sharethis')
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=6869340ddc404f0019fb1253&product=sop' async='async'></script>
    @endpush


    <script>
        document.querySelectorAll('.copy-link').forEach(button => {
            button.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link copied to clipboard!');
                }).catch(err => {
                    alert('Failed to copy link: ' + err);
                });
            });
        });
    </script>
@endsection
