<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Cetako Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favico.png') }}">
    <script src="https://unpkg.com/lucide@0.460.0/dist/umd/lucide.js"></script>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Plus Jakarta Sans',sans-serif; min-height:100vh;
            background:linear-gradient(135deg,#17335F 0%,#0e213f 100%);
            display:flex; align-items:center; justify-content:center; padding:20px;
        }
        .login-card {
            background:white; border-radius:24px; padding:48px 40px;
            width:100%; max-width:420px; box-shadow:0 24px 64px rgba(0,0,0,0.2);
        }
        .login-logo { text-align:center; margin-bottom:32px; }
        .login-logo img { height:48px; margin-bottom:12px; }
        .login-logo h1 { font-size:1.3rem; color:#17335F; font-weight:700; }
        .login-logo p { font-size:0.85rem; color:#94a3b8; margin-top:4px; }
        .form-group { margin-bottom:20px; }
        .form-label { display:block; font-size:0.82rem; font-weight:600; color:#17335F; margin-bottom:6px; }
        .form-input {
            width:100%; padding:12px 16px; border:1px solid #e2e8f0; border-radius:12px;
            font-family:inherit; font-size:0.9rem; outline:none; transition:all .2s;
        }
        .form-input:focus { border-color:#F2383D; box-shadow:0 0 0 3px rgba(242,56,61,0.1); }
        .btn-login {
            width:100%; padding:14px; background:#F2383D; color:white;
            border:none; border-radius:12px; font-family:inherit;
            font-size:0.95rem; font-weight:700; cursor:pointer; transition:all .2s;
            display:flex; align-items:center; justify-content:center; gap:8px;
        }
        .btn-login:hover { background:#d42a2f; transform:translateY(-1px); box-shadow:0 8px 24px rgba(242,56,61,0.3); }
        .alert-error {
            padding:12px 16px; background:#fee2e2; color:#dc2626;
            border-radius:10px; font-size:0.85rem; margin-bottom:20px;
            border:1px solid #fecaca;
        }
        .login-footer { text-align:center; margin-top:24px; font-size:0.8rem; color:#94a3b8; }
        .login-footer a { color:#F2383D; font-weight:600; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo">
            <img src="{{ asset('images/logo-clean.png') }}" alt="Cetako">
            <h1>Admin Dashboard</h1>
            <p>Masuk untuk mengelola website Cetako</p>
        </div>

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.authenticate') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="admin@cetako.com" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-login">
                <i data-lucide="log-in" style="width:18px;height:18px;"></i>
                Masuk
            </button>
        </form>
        <div class="login-footer">
            <a href="/">← Kembali ke website</a>
        </div>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>
