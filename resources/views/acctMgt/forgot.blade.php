@extends('forms.base')
@section('title', 'Forgot Password')
@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1 text-white">Forgot Password</h2>
    <p class="text-secondary" style="font-size: 0.95rem;">Enter your email to receive a forensic recovery link</p>
</div>

@isset($_GET['error'])
    <div class="alert alert-danger border-0 rounded-3 py-3 mb-4 text-white" style="background-color: rgba(220, 38, 38, 0.2); border: 1px solid rgba(220, 38, 38, 0.4) !important;">
        @if($_GET['error'] === 'not_found')
            Email not found in our records.
        @else
            An error occurred.
        @endif
    </div>
@endisset

@isset($_GET['success'])
    <div class="alert alert-success border-0 rounded-3 py-3 mb-4 text-white" style="background-color: rgba(16, 185, 129, 0.2); border: 1px solid rgba(16, 185, 129, 0.4) !important;">
        Reset link generated! 
        @isset($_SESSION['flash_reset_link'])
            <div class="mt-3 p-3 rounded-3 text-break font-monospace" style="background-color: rgba(17, 24, 39, 0.6); border: 1px solid #1f2937;">
                <a href="{{ $_SESSION['flash_reset_link'] }}" class="text-success fw-bold text-decoration-none">Click here to reset password</a>
            </div>
            @php unset($_SESSION['flash_reset_link']); @endphp
        @else
            Please check your email.
        @endisset
    </div>
@endisset

<form id="forgot" class="styleform_form mt-3">
    <!-- CSRF Token -->
     <input type="hidden" name="token" value="{{ $_SESSION['token'] }}">
     @includeIf('partials.loader', ['notificationId' => 'forgot'])

    <div class="mb-4">
        <label class="form-label text-uppercase small fw-bold">Email Address</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="name@company.com" required autofocus>
        </div>
    </div>
    <button type="button" id="button" class="btn btn-primary w-100 py-3 fw-bold mb-4 rounded-3 d-flex justify-content-center align-items-center">
        Send Recovery Link <i class="fas fa-arrow-right ms-2"></i>
    </button>

    <div class="text-center small text-secondary">
        Remembered your password? <a href="/login" class="text-cyan text-cyan-hover fw-bold">Sign In</a>
    </div>
</form>

@endsection
