<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') - Cetako Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favico.png') }}">
    <script src="https://unpkg.com/lucide@0.460.0/dist/umd/lucide.js"></script>
    <style>
        :root {
            --navy: #17335F; --navy-dark: #0e213f; --red: #F2383D; --red-dark: #d42a2f;
            --cream: #F5F2EC; --beige: #E9E3DC; --charcoal: #25262A;
            --sidebar-w: 260px; --topbar-h: 64px;
            --success: #22c55e; --warning: #f59e0b; --danger: #ef4444; --info: #3b82f6;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Plus Jakarta Sans',sans-serif; background:#f1f5f9; color:#334155; min-height:100vh; }
        a { text-decoration:none; color:inherit; }

        /* SIDEBAR */
        .sidebar {
            position:fixed; left:0; top:0; width:var(--sidebar-w); height:100vh;
            background:var(--navy); color:white; z-index:100;
            display:flex; flex-direction:column; transition:all .3s ease;
        }
        .sidebar-header {
            padding:20px 24px; border-bottom:1px solid rgba(255,255,255,0.08);
            display:flex; align-items:center; gap:12px;
        }
        .sidebar-header img { height:32px; filter:brightness(10); }
        .sidebar-header span { font-weight:700; font-size:1.1rem; }
        .sidebar-nav { flex:1; padding:16px 12px; overflow-y:auto; }
        .sidebar-label {
            font-size:0.7rem; font-weight:600; text-transform:uppercase;
            letter-spacing:1.5px; color:rgba(255,255,255,0.35); padding:16px 12px 8px;
        }
        .sidebar-link {
            display:flex; align-items:center; gap:12px; padding:11px 16px;
            border-radius:10px; font-size:0.88rem; font-weight:500;
            color:rgba(255,255,255,0.65); transition:all .2s ease; margin-bottom:2px;
        }
        .sidebar-link:hover { background:rgba(255,255,255,0.08); color:white; }
        .sidebar-link.active { background:var(--red); color:white; font-weight:600; }
        .sidebar-footer {
            padding:16px 20px; border-top:1px solid rgba(255,255,255,0.08);
            font-size:0.78rem; color:rgba(255,255,255,0.4);
        }

        /* MAIN */
        .main { margin-left:var(--sidebar-w); min-height:100vh; }
        .topbar {
            height:var(--topbar-h); background:white; border-bottom:1px solid #e2e8f0;
            display:flex; align-items:center; justify-content:space-between;
            padding:0 32px; position:sticky; top:0; z-index:50;
        }
        .topbar-title { font-size:1.1rem; font-weight:700; color:var(--navy); }
        .topbar-right { display:flex; align-items:center; gap:16px; }
        .topbar-user {
            display:flex; align-items:center; gap:10px;
            padding:6px 14px 6px 6px; background:#f8fafc; border-radius:100px;
            font-size:0.85rem; font-weight:500;
        }
        .topbar-avatar {
            width:32px; height:32px; border-radius:50%; background:var(--navy);
            color:white; display:flex; align-items:center; justify-content:center;
            font-size:0.8rem; font-weight:700;
        }
        .content { padding:32px; }

        /* CARDS */
        .stats-row { display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px; margin-bottom:32px; }
        .stat-card {
            background:white; border-radius:16px; padding:24px;
            border:1px solid #e2e8f0; transition:all .2s ease;
        }
        .stat-card:hover { box-shadow:0 4px 12px rgba(0,0,0,0.06); transform:translateY(-2px); }
        .stat-card-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; }
        .stat-card-icon {
            width:44px; height:44px; border-radius:12px; display:flex;
            align-items:center; justify-content:center;
        }
        .stat-card-value { font-size:2rem; font-weight:800; color:var(--navy); }
        .stat-card-label { font-size:0.82rem; color:#94a3b8; font-weight:500; }

        /* TABLE */
        .card { background:white; border-radius:16px; border:1px solid #e2e8f0; overflow:hidden; }
        .card-header {
            padding:20px 24px; border-bottom:1px solid #e2e8f0;
            display:flex; justify-content:space-between; align-items:center;
        }
        .card-title { font-size:1rem; font-weight:700; color:var(--navy); }
        .table-wrap { overflow-x:auto; }
        table { width:100%; border-collapse:collapse; }
        th { padding:12px 20px; text-align:left; font-size:0.78rem; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; color:#94a3b8; background:#f8fafc; border-bottom:1px solid #e2e8f0; }
        td { padding:14px 20px; font-size:0.88rem; border-bottom:1px solid #f1f5f9; }
        tr:hover td { background:#fafbfc; }

        /* BADGES */
        .badge {
            display:inline-flex; padding:4px 12px; border-radius:100px;
            font-size:0.75rem; font-weight:600;
        }
        .badge-success { background:#dcfce7; color:#16a34a; }
        .badge-warning { background:#fef3c7; color:#d97706; }
        .badge-danger { background:#fee2e2; color:#dc2626; }

        /* BUTTONS */
        .btn {
            display:inline-flex; align-items:center; gap:6px;
            padding:10px 20px; border-radius:10px; font-family:inherit;
            font-size:0.85rem; font-weight:600; border:none; cursor:pointer;
            transition:all .2s ease;
        }
        .btn-primary { background:var(--red); color:white; }
        .btn-primary:hover { background:var(--red-dark); transform:translateY(-1px); }
        .btn-navy { background:var(--navy); color:white; }
        .btn-navy:hover { background:var(--navy-dark); }
        .btn-outline { background:white; color:var(--charcoal); border:1px solid #e2e8f0; }
        .btn-outline:hover { border-color:var(--navy); color:var(--navy); }
        .btn-sm { padding:6px 14px; font-size:0.8rem; }
        .btn-danger { background:var(--danger); color:white; }
        .btn-danger:hover { background:#dc2626; }
        .btn-icon { width:36px; height:36px; padding:0; justify-content:center; border-radius:10px; }

        /* FORMS */
        .form-group { margin-bottom:20px; }
        .form-label { display:block; font-size:0.82rem; font-weight:600; color:var(--navy); margin-bottom:6px; }
        .form-hint { font-size:0.75rem; color:#94a3b8; margin-top:4px; }
        .form-input, .form-select, .form-textarea {
            width:100%; padding:10px 14px; border:1px solid #e2e8f0; border-radius:10px;
            font-family:inherit; font-size:0.9rem; color:#334155;
            background:white; transition:all .2s ease; outline:none;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color:var(--red); box-shadow:0 0 0 3px rgba(242,56,61,0.1);
        }
        .form-textarea { resize:vertical; min-height:120px; }
        .form-row { display:grid; grid-template-columns:1fr 1fr; gap:16px; }

        /* ALERTS */
        .alert {
            padding:14px 20px; border-radius:12px; font-size:0.88rem;
            margin-bottom:20px; display:flex; align-items:center; gap:10px;
        }
        .alert-success { background:#dcfce7; color:#16a34a; border:1px solid #bbf7d0; }
        .alert-error { background:#fee2e2; color:#dc2626; border:1px solid #fecaca; }

        /* TABS */
        .tabs { display:flex; gap:4px; border-bottom:2px solid #e2e8f0; margin-bottom:24px; }
        .tab {
            padding:12px 20px; font-size:0.88rem; font-weight:600; color:#94a3b8;
            border-bottom:2px solid transparent; margin-bottom:-2px; cursor:pointer;
            transition:all .2s ease; background:none; border-top:none; border-left:none; border-right:none;
            font-family:inherit;
        }
        .tab:hover { color:var(--navy); }
        .tab.active { color:var(--red); border-bottom-color:var(--red); }
        .tab-content { display:none; }
        .tab-content.active { display:block; }

        /* PAGINATION */
        .pagination { display:flex; gap:4px; justify-content:center; padding:20px; }
        .pagination a, .pagination span {
            padding:8px 14px; border-radius:8px; font-size:0.85rem;
            border:1px solid #e2e8f0; color:#64748b;
        }
        .pagination span.current { background:var(--red); color:white; border-color:var(--red); }
        .pagination a:hover { background:#f1f5f9; }

        @media(max-width:768px) {
            .sidebar { transform:translateX(-100%); }
            .sidebar.open { transform:translateX(0); }
            .main { margin-left:0; }
            .content { padding:20px; }
            .form-row { grid-template-columns:1fr; }
            .stats-row { grid-template-columns:1fr 1fr; }
        }
    </style>
    @yield('styles')
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/logo-clean.png') }}" alt="Cetako" style="max-height: 40px; width: auto; object-fit: contain; display: block; margin: 0 auto;">
        </div>
        <nav class="sidebar-nav">
            <div class="sidebar-label">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i data-lucide="layout-dashboard" style="width:20px;height:20px;"></i>
                Dashboard
            </a>
            <a href="{{ route('admin.articles.index') }}" class="sidebar-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                <i data-lucide="file-text" style="width:20px;height:20px;"></i>
                Artikel
            </a>
            <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i data-lucide="shopping-bag" style="width:20px;height:20px;"></i>
                Produk
            </a>

            <div class="sidebar-label">Halaman</div>
            <a href="{{ route('admin.pages.tentang') }}" class="sidebar-link {{ request()->routeIs('admin.pages.tentang*') ? 'active' : '' }}">
                <i data-lucide="info" style="width:18px;height:18px;"></i> Tentang Kami
            </a>
            <a href="{{ route('admin.pages.layanan') }}" class="sidebar-link {{ request()->routeIs('admin.pages.layanan*') ? 'active' : '' }}">
                <i data-lucide="layers" style="width:18px;height:18px;"></i> Layanan
            </a>

            <div class="sidebar-label">Konten Landing Page</div>
            <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <i data-lucide="message-square" style="width:20px;height:20px;"></i>
                Testimonial
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="sidebar-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                <i data-lucide="help-circle" style="width:20px;height:20px;"></i>
                FAQ
            </a>
            <a href="{{ route('admin.stats.index') }}" class="sidebar-link {{ request()->routeIs('admin.stats.*') ? 'active' : '' }}">
                <i data-lucide="bar-chart-3" style="width:20px;height:20px;"></i>
                Statistik
            </a>

            <div class="sidebar-label">Pengaturan</div>
            <a href="{{ route('admin.settings') }}" class="sidebar-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <i data-lucide="settings" style="width:20px;height:20px;"></i>
                Pengaturan Website
            </a>
            <a href="/" target="_blank" class="sidebar-link">
                <i data-lucide="external-link" style="width:20px;height:20px;"></i>
                Lihat Website
            </a>
        </nav>
        <div class="sidebar-footer">
            &copy; {{ date('Y') }} Cetako Admin
        </div>
    </aside>

    <div class="main">
        <header class="topbar">
            <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
            <div class="topbar-right">
                <a href="/" target="_blank" class="btn btn-outline btn-sm">
                    <i data-lucide="eye" style="width:14px;height:14px;"></i> Preview
                </a>
                <div class="topbar-user">
                    <div class="topbar-avatar">A</div>
                    Admin
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-sm">
                        <i data-lucide="log-out" style="width:14px;height:14px;"></i>
                    </button>
                </form>
            </div>
        </header>

        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    <i data-lucide="check-circle" style="width:18px;height:18px;"></i>
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-error">
                    <i data-lucide="alert-circle" style="width:18px;height:18px;"></i>
                    {{ $errors->first() }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
    @yield('scripts')
</body>
</html>
