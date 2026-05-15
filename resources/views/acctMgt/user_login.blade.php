@extends('base')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg rounded-5 overflow-hidden">
                <div class="p-5">
                    <div class="text-center mb-5">
                        <img src="/public/images/logo/vector/default.svg" width="60" alt="Logo" class="mb-3">
                        <h2 class="fw-bold">Welcome <span class="text-primary">Back</span></h2>
                        <p class="text-muted">Sign in to access your Decision Vault.</p>
                    </div>

            

                        @include('partials.loader', ['notificationId' => 'loginForm'])

                    <form id="loginForm">
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                <input type="email" name="email" class="form-control bg-light border-start-0" placeholder="name@example.com" required>
                            </div>
                            <p id="email_error" class="text-muted mt-2 small"></p>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <label class="form-label fw-bold small text-uppercase">Password</label>
                                <a href="forgot?verify=1" class="small text-decoration-none">Forgot?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                                <input type="password" name="password" class="form-control bg-light border-start-0" placeholder="••••••••" required>
                            </div>
                            <p id="password_error" class="text-muted mt-2 small"></p>
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" name="rememberMe" class="form-check-input" id="rememberMe">
                            <label class="form-check-label small" for="rememberMe">Remember me on this device</label>
                        </div>

                        <button type="button" id="button" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm mb-4">
                            Sign In <i class="fas fa-arrow-right ms-2"></i>
                        </button>

                           <div class="g-recaptcha" data-sitekey="{{ $_ENV['RECAPTCHA_KEY'] }}" data-theme="dark"></div>





                        <div class="text-center small text-muted">
                            Don't have an account? <a href="/register" class="fw-bold text-decoration-none">Register Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
