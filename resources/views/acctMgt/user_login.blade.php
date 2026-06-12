@extends('forms.base')
@section('title', 'Login | iDecide')
@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1 text-white">Welcome back</h2>
    <p class="text-secondary" style="font-size: 0.95rem;">Sign in to access your decision matrix</p>
</div>

<!-- Google OAuth Button -->
<a href="/auth/google" class="btn btn-outline-google mb-3 w-100 d-flex align-items-center justify-content-center">
    <svg class="me-2" width="18" height="18" viewBox="0 0 24 24">
        <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v3.927h6.6c-.29 1.5-.1.84-2.49 2.77v2.3h3.99c2.33-2.15 3.65-5.3 3.65-8.927z"/>
        <path fill="#34A853" d="M12 24c3.24 0 5.97-1.08 7.96-2.91l-3.99-3.1c-1.11.75-2.53 1.19-3.97 1.19-3.07 0-5.67-2.08-6.6-4.88H1.31v3.2A11.983 11.983 0 0 0 12 24z"/>
        <path fill="#FBBC05" d="M5.4 14.3A7.166 7.166 0 0 1 5.4 9.7V6.5H1.31A11.996 11.996 0 0 0 0 12c0 2.23.61 4.32 1.67 6.13l4.02-3.13-1.29-.7z"/>
        <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.43-3.43C17.96 1.19 15.24 0 12 0A11.983 11.983 0 0 0 1.31 6.5l4.09 3.2c.93-2.8 3.53-4.95 6.6-4.95z"/>
    </svg>
    Continue with Google
</a>

<!-- Twitter OAuth Button -->
<a href="/auth/twitter" class="btn btn-outline-info mb-4 w-100 d-flex align-items-center justify-content-center text-white" style="border-color: rgba(255,255,255,0.2);">
    <svg class="me-2" width="18" height="18" viewBox="0 0 24 24" fill="#1DA1F2">
        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
    </svg>
    Continue with Twitter
</a>

<!-- Divider -->
<div class="divider-text">
    <span>or continue with email</span>
</div>

@include('partials.loader', ['notificationId' => 'loginForm'])

<form id="loginForm" class="styleform_form mt-3">
    <!-- HIDDEN TOKEN -->
      <input type="hidden" name="token" value="{{ $_SESSION['token'] }}">

    <div class="mb-4">
        <label class="form-label text-uppercase small fw-bold">Email Address</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="name@company.com" required>
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
        <input type="checkbox" name="rememberMe" class="form-check-input" id="rememberMe">
        <label class="form-check-label small" for="rememberMe">Remember me on this device</label>
    </div>

    <button type="button" id="button" class="btn btn-primary w-100 py-3 fw-bold mb-4 rounded-3 d-flex justify-content-center align-items-center">
        Sign In <i class="fas fa-arrow-right ms-2"></i>
    </button>

    <div class="text-center small text-secondary">
        Don't have an account? <a href="/register" class="text-cyan text-cyan-hover fw-bold">Create account</a>
    </div>
</form>

@endsection