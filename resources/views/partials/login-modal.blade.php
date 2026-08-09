{{-- Modal Login Admin --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login-modal-content">
            <button type="button" class="btn-close login-modal-close" data-bs-dismiss="modal" aria-label="Tutup"></button>

            <div class="modal-body">
                <div class="login-logo"><i class="bi bi-mortarboard-fill"></i></div>
                <h2 class="login-title" id="loginModalLabel">Login Admin</h2>
                <p class="login-subtitle">Masuk untuk mengelola konten website sekolah</p>

                @if ($errors->has('email') || $errors->has('password'))
                    <div class="alert alert-danger py-2 small">
                        @foreach ($errors->get('email') as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                        @foreach ($errors->get('password') as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <div class="input-icon-wrap">
                            <i class="bi bi-envelope"></i>
                            <input type="email" class="form-control" id="loginEmail" name="email"
                                   value="{{ old('email') }}" placeholder="admin@sekolah.sch.id" required
                                   {{ $errors->any() ? 'autofocus' : '' }}>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <div class="input-icon-wrap position-relative">
                            <i class="bi bi-lock"></i>
                            <input type="password" class="form-control" id="loginPassword" name="password"
                                   placeholder="••••••••" required>
                            <button type="button" class="toggle-password" onclick="toggleLoginPassword()">
                                <i class="bi bi-eye" id="toggleLoginIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="loginRemember" name="remember">
                        <label class="form-check-label small text-muted" for="loginRemember">Ingat saya</label>
                    </div>

                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .login-modal-content {
        border: none;
        border-radius: 20px;
        padding: 12px;
        box-shadow: 0 25px 60px rgba(15, 23, 42, 0.35);
    }
    .login-modal-close {
        position: absolute;
        top: 18px;
        right: 18px;
        z-index: 2;
    }
    .login-modal-content .modal-body { padding: 32px 30px 26px; }
    .login-logo {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        color: #fff;
        margin: 0 auto 16px;
    }
    .login-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 1.3rem;
        color: var(--dark-blue);
        text-align: center;
        margin-bottom: 4px;
    }
    .login-subtitle {
        text-align: center;
        color: #64748B;
        font-size: 0.9rem;
        margin-bottom: 24px;
    }
    #loginModal .form-label {
        font-weight: 600;
        font-size: 0.86rem;
        color: var(--dark-blue);
    }
    #loginModal .form-control {
        border-radius: 12px;
        padding: 11px 16px;
        border: 1.5px solid #E2E8F0;
        font-size: 0.94rem;
    }
    #loginModal .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.15);
    }
    .input-icon-wrap { position: relative; }
    .input-icon-wrap i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #94A3B8;
    }
    .input-icon-wrap .form-control { padding-left: 42px; }
    .btn-login {
        width: 100%;
        border: none;
        border-radius: 12px;
        padding: 12px;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        transition: 0.25s ease;
    }
    .btn-login:hover { filter: brightness(1.07); color: #fff; }
    .toggle-password {
        position: absolute;
        top: 50%;
        right: 14px;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #94A3B8;
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script>
    function toggleLoginPassword() {
        const input = document.getElementById('loginPassword');
        const icon = document.getElementById('toggleLoginIcon');
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    }

    @if ($errors->has('email') || $errors->has('password'))
        // Buka kembali modal otomatis jika login gagal
        document.addEventListener('DOMContentLoaded', function () {
            const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        });
    @endif
</script>
@endpush
