@extends('base')

@section('title', 'Create Account')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg rounded-5 overflow-hidden">
                <div class="p-5">
                    <div class="text-center mb-5">
                        <img src="/public/images/logo/vector/default.svg" width="60" alt="Logo" class="mb-3">
                        <h2 class="fw-bold">Start Your <span class="text-primary">Journey</span></h2>
                        <p class="text-muted">Create an account to unlock your personal Decision Vault.</p>
                    </div>

                    @include('partials.loader', ['notificationId' => 'regForm'])


                    <form id="regForm">
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                                <input type="text" name="name" class="form-control bg-light border-start-0" placeholder="John Doe" required>
                            </div>
                            <p id="name_error" class="mt-2 text-muted"></p>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                <input type="email" name="email" class="form-control bg-light border-start-0" placeholder="name@example.com" required>
                            </div>
                            <p id="email_error" class="mt-2 text-muted"></p>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                                <input type="password" name="password" class="form-control bg-light border-start-0" placeholder="••••••••" required minlength="8">
                            </div>
                            <p id="password_error" class="mt-2 text-muted"></p>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-shield-alt text-muted"></i></span>
                                <input type="password" name="confirm_password" class="form-control bg-light border-start-0" placeholder="••••••••" required>
                            </div>
                            <p id="confirm_password_error" class="mt-2 text-muted"></p>
                        </div>

                        <button type="button" id="button" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm mb-4">
                            Create Account <i class="fas fa-user-plus ms-2"></i>
                        </button>

                        <div class="g-recaptcha" data-sitekey="{{ $_ENV['RECAPTCHA_KEY'] }}" data-theme="dark"></div>








                        <div class="text-center small text-muted">
                            Already have an account? <a href="/login" class="fw-bold text-decoration-none">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
