@extends('base')

@section('title', 'About Us')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4" style="color: var(--primary-color);">About Us</h1>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2>Welcome to iDecide</h2>
            <p>iDecide is a powerful tool designed to simplify your decision-making process. Launched in 2025, our mission is to empower individuals and businesses with data-driven insights to make confident choices. Whether you're deciding on a purchase, a career move, or a personal goal, our platform provides a structured approach to evaluate options effectively.</p>

            <h2>Our Features</h2>
            <ul class="list-unstyled">
                <li class="mb-2"><strong>Intuitive Interface:</strong> Easy-to-use design for all skill levels.</li>
                <li class="mb-2"><strong>Customizable Criteria:</strong> Tailor the tool to your specific needs.</li>
                <li class="mb-2"><strong>Real-Time Scoring:</strong> Get instant feedback with our gauge visualization.</li>
                <li class="mb-2"><strong>Personalized Advice:</strong> Receive tailored recommendations based on your input.</li>
            </ul>

            <h2>Our Mission</h2>
            <p>At iDecide, we are committed to enhancing decision-making through innovative technology. Founded with a vision to bridge the gap between complexity and clarity, we strive to deliver a user-friendly experience that supports informed decisions. Our team is dedicated to continuous improvement, ensuring the Decision Matrix evolves with your needs.</p>

            <h2>Contact Us</h2>
            <p>Learn more or get involved by reaching out at <a href="mailto:{{ env('SUPPORT_EMAIL') }}" style="color: var(--primary-color);">{{ env('SUPPORT_EMAIL') }}</a> .</p>
        </div>
    </div>
</div>
@endsection