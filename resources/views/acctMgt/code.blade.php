@extends('forms.base')

@section('title', 'Security Verification')

@section('content')

<div class="mb-4 text-center text-lg-start">
    <h2 class="fw-bold mb-1 text-white">Security Verification</h2>
    <p class="text-secondary" style="font-size: 0.95rem;">Please enter the 6-digit code sent to your email to verify your identity.</p>
</div>

<form id="code" class="styleform_form mt-3">
     <input type="hidden" name="token" value="{{ $_SESSION['token'] }}">

    @includeIf('partials.loader', ['notificationId' => 'code'])

    <!-- 6-Digit OTP Container -->
    <div class="d-flex justify-content-between gap-2 mb-4" id="otp-container">
        @for ($i = 1; $i <= 6; $i++)
            <input type="text" 
                   class="form-control form-control-lg text-center otp-input fw-bold fs-3" 
                   maxlength="1" 
                   pattern="[a-zA-Z0-9]*" 
                   inputmode="text"
                   id="otp{{ $i }}"
                   autocomplete="{{ $i === 1 ? 'one-time-code' : 'off' }}"
                    style="height: 60px; border-radius: 12px; border: 1px solid #e2e8f0; background-color: #ffffff !important; color: #0f172a !important;"
                   required>
        @endfor
    </div>

    <input type="hidden" name="code" id="codeHidden">
    <input type="hidden" name="token" id="token" value="{{ $_SESSION['token'] }}">

    <button type="submit" id="button" class="btn btn-primary w-100 py-3 fw-bold mb-4 rounded-3 d-flex justify-content-center align-items-center">
        Verify & Continue <i class="fas fa-arrow-right ms-2"></i>
    </button>

    <div class="text-center mb-3">
        <button type="button" class="btn btn-outline-google btn-sm px-4 py-2 w-auto d-inline-flex" id="pasteBtn">
            <i class="fas fa-paste me-2"></i> Paste Code from Email
        </button>
    </div>

    <div class="text-center mt-4">
        <p class="text-secondary small mb-1">Didn't receive the code?</p>
        <a href="javascript:void(0)" class="text-cyan text-cyan-hover fw-bold text-decoration-none small" id="resendBtn">
            Resend Verification Code
        </a>
    </div>
</form>

<style>
    .otp-input:focus {
        border-color: #0ea5e9 !important;
        box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.15) !important;
    }
</style>


@endsection