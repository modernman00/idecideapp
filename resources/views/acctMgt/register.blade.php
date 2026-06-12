@extends('forms.base')
@section('title', 'Register | iDecide')
@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1 text-white">Create an account</h2>
    <p class="text-secondary" style="font-size: 0.95rem;">Join the future of decision making</p>
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
