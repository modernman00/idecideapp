@extends('base')

@section('title', 'iDecide Decision Matrix - Blog')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">iDecide Blog</h1>

    <!-- Image Upload Form -->

    <div class="row">
        <!-- Blog Post 1 -->
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 custom-card">
                <img src="{{ getenv('APP_URL') }}/public/images/about-image.jpg" class="card-img-top" alt="Decision Matrices">
                <div class="card-body p-4">
                    <h5 class="card-title">The Power of Decision Matrices</h5>
                    <h6 class="card-subtitle text-muted">June 09, 2025, 07:03 PM</h6>
                    <p class="card-text">Learn how decision matrices simplify complex choices by breaking them into criteria and weights. This tool is ideal for evaluating options systematically, perfect for personal or professional use. Assign scores to factors like cost, time, and impact—e.g., choosing software by weighing features, price, and support. iDecide calculates the best option, reducing bias and boosting confidence.</p>
                    <p class="card-text">Widely used in business and project management, decision matrices benefit from iDecide’s real-time scoring. Input criteria, set weights, and get clear results, even for group decisions. Try iDecide to streamline your process and make informed choices with ease!</p>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(getenv('APP_URL') . '/blog#post1') }}" target="_blank" class="btn btn-primary">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(getenv('APP_URL') . '/blog#post1') }}&text=The Power of Decision Matrices - iDecide&via=iDecide" target="_blank" class="btn btn-info">Twitter</a>
                        <a href="https://wa.me/?text=Check out The Power of Decision Matrices on iDecide! {{ urlencode(getenv('APP_URL') . '/blog#post1') }}" target="_blank" class="btn btn-success">WhatsApp</a>
                        <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(getenv('APP_URL') . '/blog#post1') }}&title=The Power of Decision Matrices - iDecide" target="_blank" class="btn btn-dark">LinkedIn</a>
                        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(getenv('APP_URL') . '/blog#post1') }}&media={{ urlencode(getenv('APP_URL') . '/images/blog-post-1.jpg') }}&description=The Power of Decision Matrices - iDecide" target="_blank" class="btn btn-danger">Pinterest</a>
                        <button class="btn btn-secondary copy-link" data-url="{{ getenv('APP_URL') . '/blog#post1' }}">Copy Link</button>
                    </div>
                </div>
            </div>
            <!-- Metadata for Post 1 -->
            <meta property="og:title" content="The Power of Decision Matrices - iDecide">
            <meta property="og:description" content="Learn how decision matrices simplify complex choices with iDecide.">
            <meta property="og:image" content="{{ getenv('APP_URL') . '/images/blog-post-1.jpg' }}">
            <meta property="og:url" content="{{ getenv('APP_URL') . '/blog#post1' }}">
            <meta property="og:type" content="article">
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:title" content="The Power of Decision Matrices - iDecide">
            <meta name="twitter:description" content="Learn how decision matrices simplify complex choices with iDecide.">
            <meta name="twitter:image" content="{{ getenv('APP_URL') . '/images/blog-post-1.jpg' }}">
        </div>

        <!-- Blog Post 2 -->
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 custom-card">
                  <img src="{{ getenv('APP_URL') }}/public/images/about-image.jpg" class="card-img-top" alt="Overcoming Indecision">
                <div class="card-body p-4">
                    <h5 class="card-title">Overcoming Indecision with iDecide</h5>
                    <h6 class="card-subtitle text-muted">June 09, 2025, 07:03 PM</h6>
                    <p class="card-text">Discover strategies to combat indecision and how iDecide guides you to clarity. Indecision often arises from too many options or unclear priorities. Use techniques like setting goals, limiting choices, and leveraging data-driven tools. iDecide offers a framework to input options and criteria, providing real-time scores—e.g., weighing salary, location, and growth for a career move.</p>
                    <p class="card-text">Indecision can halt progress, but iDecide’s interface breaks it into steps with visual feedback. Ideal for choosing vacations or investments, it ensures confident decisions. Start using iDecide today to overcome hesitation and act decisively!</p>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(getenv('APP_URL') . '/blog#post2') }}" target="_blank" class="btn btn-primary">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(getenv('APP_URL') . '/blog#post2') }}&text=Overcoming Indecision with iDecide&via=iDecide" target="_blank" class="btn btn-info">Twitter</a>
                        <a href="https://wa.me/?text=Check out Overcoming Indecision with iDecide! {{ urlencode(getenv('APP_URL') . '/blog#post2') }}" target="_blank" class="btn btn-success">WhatsApp</a>
                        <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(getenv('APP_URL') . '/blog#post2') }}&title=Overcoming Indecision with iDecide" target="_blank" class="btn btn-dark">LinkedIn</a>
                        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(getenv('APP_URL') . '/blog#post2') }}&media={{ urlencode(getenv('APP_URL') . '/images/blog-post-2.jpg') }}&description=Overcoming Indecision with iDecide" target="_blank" class="btn btn-danger">Pinterest</a>
                        <button class="btn btn-secondary copy-link" data-url="{{ getenv('APP_URL') . '/blog#post2' }}">Copy Link</button>
                    </div>
                </div>
            </div>
            <!-- Metadata for Post 2 -->
            <meta property="og:title" content="Overcoming Indecision with iDecide">
            <meta property="og:description" content="Discover strategies to combat indecision with iDecide.">
            <meta property="og:image" content="{{ getenv('APP_URL') . '/images/blog-post-2.jpg' }}">
            <meta property="og:url" content="{{ getenv('APP_URL') . '/blog#post2' }}">
            <meta property="og:type" content="article">
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:title" content="Overcoming Indecision with iDecide">
            <meta name="twitter:description" content="Discover strategies to combat indecision with iDecide.">
            <meta name="twitter:image" content="{{ getenv('APP_URL') . '/images/blog-post-2.jpg' }}">
        </div>

        <!-- Blog Post 3 -->
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 custom-card">
                   <img src="{{ getenv('APP_URL') }}/public/images/about-image.jpg"
                   class="card-img-top" alt="Decision-Making Mistakes">
                <div class="card-body p-4">
                    <h5 class="card-title">Top 5 Decision-Making Mistakes</h5>
                    <h6 class="card-subtitle text-muted">June 09, 2025, 07:03 PM</h6>
                    <p class="card-text">Avoid pitfalls that derail your decision-making. Mistakes include overthinking, ignoring data, emotional bias, unclear criteria, and rushing. iDecide mitigates these with a structured approach—e.g., inputting data to avoid hasty purchases. Define criteria, use real data, and consider long-term impacts to improve outcomes.</p>
                    <p class="card-text">These errors often go unnoticed until regret sets in. iDecide’s interface and advice help you pause, evaluate, and choose wisely, whether for business or personal goals. Refine your skills and achieve better results with iDecide today!</p>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(getenv('APP_URL') . '/blog#post3') }}" target="_blank" class="btn btn-primary">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(getenv('APP_URL') . '/blog#post3') }}&text=Top 5 Decision-Making Mistakes - iDecide&via=iDecide" target="_blank" class="btn btn-info">Twitter</a>
                        <a href="https://wa.me/?text=Check out Top 5 Decision-Making Mistakes on iDecide! {{ urlencode(getenv('APP_URL') . '/blog#post3') }}" target="_blank" class="btn btn-success">WhatsApp</a>
                        <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(getenv('APP_URL') . '/blog#post3') }}&title=Top 5 Decision-Making Mistakes - iDecide" target="_blank" class="btn btn-dark">LinkedIn</a>
                        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(getenv('APP_URL') . '/blog#post3') }}&media={{ urlencode(getenv('APP_URL') . '/images/blog-post-3.jpg') }}&description=Top 5 Decision-Making Mistakes - iDecide" target="_blank" class="btn btn-danger">Pinterest</a>
                        <button class="btn btn-secondary copy-link" data-url="{{ getenv('APP_URL') . '/blog#post3' }}">Copy Link</button>
                    </div>
                </div>
            </div>
            <!-- Metadata for Post 3 -->
            <meta property="og:title" content="Top 5 Decision-Making Mistakes - iDecide">
            <meta property="og:description" content="Avoid common pitfalls that derail your decisions with iDecide.">
            <meta property="og:image" content="{{ getenv('APP_URL') . '/images/blog-post-3.jpg' }}">
            <meta property="og:url" content="{{ getenv('APP_URL') . '/blog#post3' }}">
            <meta property="og:type" content="article">
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:title" content="Top 5 Decision-Making Mistakes - iDecide">
            <meta name="twitter:description" content="Avoid common pitfalls that derail your decisions with iDecide.">
            <meta name="twitter:image" content="{{ getenv('APP_URL') . '/images/blog-post-3.jpg' }}">
        </div>

        <!-- Blog Post 4 -->
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 custom-card">
                   <img src="{{ getenv('APP_URL') }}/public/images/about-image.jpg" 
                   class="card-img-top" alt="Weighing Pros and Cons">
                <div class="card-body p-4">
                    <h5 class="card-title">How to Weigh Pros and Cons Effectively</h5>
                    <h6 class="card-subtitle text-muted">June 09, 2025, 07:03 PM</h6>
                    <p class="card-text">Master balancing pros and cons with practical tips. List benefits and drawbacks, assign weights based on goals—e.g., for a car choice, weigh fuel efficiency, cost, and safety. iDecide calculates which factors matter most, ensuring a balanced evaluation and avoiding overlooked aspects.</p>
                    <p class="card-text">Test assumptions with data using iDecide’s interface for instant results. Perfect for job offers or home purchases, it provides visual feedback to align choices with priorities. Practice regularly to sharpen skills and reduce uncertainty with iDecide today!</p>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(getenv('APP_URL') . '/blog#post4') }}" target="_blank" class="btn btn-primary">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(getenv('APP_URL') . '/blog#post4') }}&text=How to Weigh Pros and Cons Effectively - iDecide&via=iDecide" target="_blank" class="btn btn-info">Twitter</a>
                        <a href="https://wa.me/?text=Check out How to Weigh Pros and Cons Effectively on iDecide! {{ urlencode(getenv('APP_URL') . '/blog#post4') }}" target="_blank" class="btn btn-success">WhatsApp</a>
                        <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(getenv('APP_URL') . '/blog#post4') }}&title=How to Weigh Pros and Cons Effectively - iDecide" target="_blank" class="btn btn-dark">LinkedIn</a>
                        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(getenv('APP_URL') . '/blog#post4') }}&media={{ urlencode(getenv('APP_URL') . '/images/blog-post-4.jpg') }}&description=How to Weigh Pros and Cons Effectively - iDecide" target="_blank" class="btn btn-danger">Pinterest</a>
                        <button class="btn btn-secondary copy-link" data-url="{{ getenv('APP_URL') . '/blog#post4' }}">Copy Link</button>
                    </div>
                </div>
            </div>
            <!-- Metadata for Post 4 -->
            <meta property="og:title" content="How to Weigh Pros and Cons Effectively - iDecide">
            <meta property="og:description" content="Master balancing pros and cons with iDecide.">
            <meta property="og:image" content="{{ getenv('APP_URL') . '/images/blog-post-4.jpg' }}">
            <meta property="og:url" content="{{ getenv('APP_URL') . '/blog#post4' }}">
            <meta property="og:type" content="article">
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:title" content="How to Weigh Pros and Cons Effectively - iDecide">
            <meta name="twitter:description" content="Master balancing pros and cons with iDecide.">
            <meta name="twitter:image" content="{{ getenv('APP_URL') . '/images/blog-post-4.jpg' }}">
        </div>

        <!-- Blog Post 5 -->
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 custom-card">
                   <img src="{{ getenv('APP_URL') }}/public/images/about-image.jpg" 
                   class="card-img-top" alt="AI in Decision Making">
                <div class="card-body p-4">
                    <h5 class="card-title">The Future of Decision Making with AI</h5>
                    <h6 class="card-subtitle text-muted">June 09, 2025, 07:03 PM</h6>
                    <p class="card-text">Explore how AI transforms decision-making with tools like iDecide. AI analyzes data, predicts outcomes, and offers personalized recommendations—e.g., assessing market trends for business expansion. iDecide uses this to evaluate options based on your priorities like cost and time.</p>
                    <p class="card-text">iDecide’s AI provides real-time scoring and adapts with use, reducing errors. Ideal for investments or strategies, it ensures smarter, faster decisions. Embrace this future with iDecide today and revolutionize your approach!</p>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(getenv('APP_URL') . '/blog#post5') }}" target="_blank" class="btn btn-primary">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(getenv('APP_URL') . '/blog#post5') }}&text=The Future of Decision Making with AI - iDecide&via=iDecide" target="_blank" class="btn btn-info">Twitter</a>
                        <a href="https://wa.me/?text=Check out The Future of Decision Making with AI on iDecide! {{ urlencode(getenv('APP_URL') . '/blog#post5') }}" target="_blank" class="btn btn-success">WhatsApp</a>
                        <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(getenv('APP_URL') . '/blog#post5') }}&title=The Future of Decision Making with AI - iDecide" target="_blank" class="btn btn-dark">LinkedIn</a>
                        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(getenv('APP_URL') . '/blog#post5') }}&media={{ urlencode(getenv('APP_URL') . '/images/blog-post-5.jpg') }}&description=The Future of Decision Making with AI - iDecide" target="_blank" class="btn btn-danger">Pinterest</a>
                        <button class="btn btn-secondary copy-link" data-url="{{ getenv('APP_URL') . '/blog#post5' }}">Copy Link</button>
                    </div>
                </div>
            </div>
            <!-- Metadata for Post 5 -->
            <meta property="og:title" content="The Future of Decision Making with AI - iDecide">
            <meta property="og:description" content="Explore how AI transforms decision-making with iDecide.">
            <meta property="og:image" content="{{ getenv('APP_URL') . '/images/blog-post-5.jpg' }}">
            <meta property="og:url" content="{{ getenv('APP_URL') . '/blog#post5' }}">
            <meta property="og:type" content="article">
            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:title" content="The Future of Decision Making with AI - iDecide">
            <meta name="twitter:description" content="Explore how AI transforms decision-making with iDecide.">
            <meta name="twitter:image" content="{{ getenv('APP_URL') . '/images/blog-post-5.jpg' }}">
        </div>
    </div>
</div>

<style>
.custom-card {
    position: relative;
    overflow: hidden;
    background: linear-gradient(90deg, #00c4cc, #ff6f61); /* Teal to Coral */
    border: none;
}

.custom-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white overlay */
    z-index: 0;
}

[data-theme="dark"] .custom-card::before {
    background-color: rgba(44, 62, 80, 0.8); /* Dark slate blue overlay for dark mode */
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