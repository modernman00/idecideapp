@extends('forms.base')
@section('title', 'Login | iDecide')
@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1 text-white">Welcome back</h2>
    <p class="text-secondary" style="font-size: 0.95rem;">Sign in to access your Decision Vault.</p>
</div>

<!-- Social OAuth Buttons -->
<div class="d-flex justify-content-between">
    <a href="/auth/google" class="btn btn-outline-google mb-4 flex-grow-1 me-2">
        <i class="fab fa-google me-2"></i>Google
    </a>
    <a href="/auth/twitter" class="btn btn-outline-dark mb-4 flex-grow-1 ms-2">
        <i class="fab fa-twitter me-2"></i>Twitter
    </a>
</div>

<!-- Divider -->
<div class="divider-text">
    <span>or continue with email</span>
</div>

@include('partials.loader', ['notificationId' => 'adminLogin'])


<form id="adminLogin" class="styleform_form mt-3">
    <!-- HIDDEN TOKEN -->
     <input type="hidden" name="token" value="{{ $_SESSION['token'] }}">

    <div class="mb-4">
        <label class="form-label text-uppercase small fw-bold">Email Address</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" id="email" class="form-control" placeholder="name@company.com"  required>
        </div>
        <p id="email_error" class="text-danger mt-2 small mb-0"></p>
    </div>

    <div class="mb-4">
        <div class="d-flex justify-content-between mb-2">
            <label class="form-label text-uppercase small fw-bold mb-0">Password</label>
            <a href="/forgot?verify=true" class="text-cyan text-cyan-hover small text-decoration-none">Forgot password?</a>
        </div>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            <button type="button" class="password-toggle-btn" data-target="password">
                <i class="far fa-eye"></i>
            </button>
        </div>
        <p id="password_error" class="text-danger mt-2 small mb-0"></p>
    </div>

    <div class="mb-4 form-check">
        <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
        <label class="form-check-label small" for="checkbox">Remember me on this device</label>
    </div>

    <button type="button" id="button" class="btn btn-primary w-100 py-3 fw-bold mb-4 rounded-3 d-flex justify-content-center align-items-center">
        Sign In <i class="fas fa-arrow-right ms-2"></i>
    </button>

    <div class="text-center small text-secondary">
        Don't have an account? <a href="/register" class="text-cyan text-cyan-hover fw-bold">Create account</a>
    </div>
</form>




@endsection
