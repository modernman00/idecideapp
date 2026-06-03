@extends('forms.base')
@section('title', 'Reset Password')
@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1 text-white">Reset Password</h2>
    <p class="text-secondary" style="font-size: 0.95rem;">Securely reset your password</p>
</div>

@isset($_GET['error'])
    <div class="alert alert-danger border-0 rounded-3 py-3 mb-4 text-white" style="background-color: rgba(220, 38, 38, 0.2); border: 1px solid rgba(220, 38, 38, 0.4) !important;">
        @if($_GET['error'] === 'expired')
            The reset link has expired or is invalid.
        @elseif($_GET['error'] === 'password_mismatch')
            Passwords do not match.
        @elseif($_GET['error'] === 'weak_password')
            Password must be at least 8 characters long.
        @elseif($_GET['error'] === 'missing_fields')
            Please fill in all fields.
        @else
            An error occurred. Please try again.
        @endif
    </div>
@endisset

<form id="changePassword" class="styleform_form mt-3">
    @includeIf('partials.loader', ['notificationId' => 'changePassword'])
    <!-- CSRF Token -->
 
    

    <div class="mb-4">
        <label class="form-label text-uppercase small fw-bold">New Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required autofocus>
            <button type="button" class="password-toggle-btn" data-target="password">
                <i class="far fa-eye"></i>
            </button>
        </div>
    </div>

    <div class="mb-4">
        <label class="form-label text-uppercase small fw-bold">Confirm New Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="••••••••" required>
            <button type="button" class="password-toggle-btn" data-target="confirm_password">
                <i class="far fa-eye"></i>
            </button>
        </div>
    </div>

    <button type="button" id="button" class="btn btn-primary w-100 py-3 fw-bold mb-4 rounded-3 d-flex justify-content-center align-items-center">
        Update Password <i class="fas fa-arrow-right ms-2"></i>
    </button>

    <input type="hidden" name="token" value="{{ $_SESSION['token'] }}">

</form>

@endsection
