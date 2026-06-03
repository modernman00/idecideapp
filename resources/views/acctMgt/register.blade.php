@extends('forms.base')
@section('title', 'Register | iDecide')
@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1 text-white">Create an account</h2>
    <p class="text-secondary" style="font-size: 0.95rem;">Join the future of decision making</p>
</div>

<!-- Google OAuth Button -->
<a href="/auth/google" class="btn btn-outline-google mb-4">
    <svg class="me-2" width="18" height="18" viewBox="0 0 24 24">
        <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v3.927h6.6c-.29 1.5-.1.84-2.49 2.77v2.3h3.99c2.33-2.15 3.65-5.3 3.65-8.927z"/>
        <path fill="#34A853" d="M12 24c3.24 0 5.97-1.08 7.96-2.91l-3.99-3.1c-1.11.75-2.53 1.19-3.97 1.19-3.07 0-5.67-2.08-6.6-4.88H1.31v3.2A11.983 11.983 0 0 0 12 24z"/>
        <path fill="#FBBC05" d="M5.4 14.3A7.166 7.166 0 0 1 5.4 9.7V6.5H1.31A11.996 11.996 0 0 0 0 12c0 2.23.61 4.32 1.67 6.13l4.02-3.13-1.29-.7z"/>
        <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.43-3.43C17.96 1.19 15.24 0 12 0A11.983 11.983 0 0 0 1.31 6.5l4.09 3.2c.93-2.8 3.53-4.95 6.6-4.95z"/>
    </svg>
    Sign up with Google
</a>

<!-- Divider -->
<div class="divider-text">
    <span>or continue with email</span>
</div>

@include('partials.loader', ['notificationId' => 'regForm'])

<form id="regForm" class="styleform_form mt-3">

    <input type="hidden" name="token" value="{{ $_SESSION['token'] }}">
    <div class="mb-4">
        <label class="form-label text-uppercase small fw-bold">Full Name</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" name="name" class="form-control" placeholder="John Doe" required>
        </div>
        <p id="name_error" class="text-danger mt-2 small mb-0"></p>
    </div>

    <div class="mb-4">
        <label class="form-label text-uppercase small fw-bold">Email Address</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="name@company.com" required>
        </div>
        <p id="email_error" class="text-danger mt-2 small mb-0"></p>
    </div>

    <div class="mb-4">
        <label class="form-label text-uppercase small fw-bold">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required minlength="8">
            <button type="button" class="password-toggle-btn" data-target="password">
                <i class="far fa-eye"></i>
            </button>
        </div>
        <p id="password_error" class="text-danger mt-2 small mb-0"></p>
    </div>

    <div class="mb-4">
        <label class="form-label text-uppercase small fw-bold">Confirm Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="••••••••" required>
            <button type="button" class="password-toggle-btn" data-target="confirm_password">
                <i class="far fa-eye"></i>
            </button>
        </div>
        <p id="confirm_password_error" class="text-danger mt-2 small mb-0"></p>
    </div>

    <button type="button" id="button" class="btn btn-primary w-100 py-3 fw-bold mb-4 rounded-3 d-flex justify-content-center align-items-center">
        Create Account <i class="fas fa-user-plus ms-2"></i>
    </button>

    <div class="text-center small text-secondary">
        Already have an account? <a href="/login" class="text-cyan text-cyan-hover fw-bold">Sign In</a>
    </div>
</form>


@push('scripts')
<script>
    document.getElementById('regForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        
        if (formData.get('password') !== formData.get('confirm_password')) {
            alert("Passwords do not match!");
            return;
        }

        const data = Object.fromEntries(formData);
        
        try {
            const response = await axios.post('/register', data);
            if (response.data.status === 'success') {
                const success = document.getElementById('reg_success');
                success.textContent = response.data.message;
                success.classList.remove('d-none');
                e.target.reset();
                setTimeout(() => window.location.href = '/login', 2000);
            } else {
                const err = document.getElementById('reg_error');
                err.textContent = response.data.message;
                err.classList.remove('d-none');
            }
        } catch (err) {
            console.error(err);
        }
    });
</script>
@endpush
@endsection
