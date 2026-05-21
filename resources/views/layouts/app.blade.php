@php
    $siteSettings = \App\Models\SiteSetting::getAll();
    $__defaultDescription = ($siteSettings['seo']['seo_description'] ?? null) ?: 'Cetako - Solusi terbaik untuk kebutuhan Printing, Advertising, dan Packaging Anda. Kualitas terjamin, harga bersaing, pengerjaan cepat.';
    $__defaultTitle = ($siteSettings['seo']['seo_title'] ?? null) ?: 'Cetako - Printing, Advertising & Packaging';
    $__contact = $siteSettings['contact'] ?? [];
    $__social = $siteSettings['social'] ?? [];
    $__company = $siteSettings['company'] ?? [];
    // Allow child views to override via @section('meta_description', '...')
    $__metaDesc = $__seoDescription ?? null;
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $__metaDesc ?: $__env->yieldContent('meta_description', $__defaultDescription) }}">
    <meta name="keywords" content="{{ $siteSettings['seo']['seo_keywords'] ?? 'percetakan, printing, advertising, packaging, cetak, kemasan, iklan' }}">
    <meta name="author" content="{{ $siteSettings['company']['company_name'] ?? 'Cetako' }}">
    <meta name="robots" content="index, follow">
    <title>@yield('title', $__defaultTitle)</title>

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ $__seoCanonical ?? url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="{{ $__ogType ?? 'website' }}">
    <meta property="og:url" content="{{ $__seoCanonical ?? url()->current() }}">
    <meta property="og:title" content="@yield('title', $__defaultTitle)">
    <meta property="og:description" content="{{ $__metaDesc ?: $__env->yieldContent('meta_description', $__defaultDescription) }}">
    <meta property="og:image" content="{{ $__seoImage ?? asset('images/logo-clean.png') }}">
    <meta property="og:site_name" content="{{ $siteSettings['company']['company_name'] ?? 'Cetako' }}">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', $__defaultTitle)">
    <meta name="twitter:description" content="{{ $__metaDesc ?: $__env->yieldContent('meta_description', $__defaultDescription) }}">
    <meta name="twitter:image" content="{{ $__seoImage ?? asset('images/logo-clean.png') }}">

    {{-- JSON-LD Structured Data - LocalBusiness (always present) --}}
    @php
        $__socials = array_values(array_filter([
            $siteSettings['social']['social_instagram'] ?? null,
            $siteSettings['social']['social_facebook'] ?? null,
            $siteSettings['social']['social_youtube'] ?? null,
            $siteSettings['social']['social_linkedin'] ?? null,
            $siteSettings['social']['social_tiktok'] ?? null,
        ]));
    @endphp
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => $__company['company_name'] ?? 'Cetako',
        'description' => ($siteSettings['seo']['seo_description'] ?? null) ?: 'Solusi terbaik untuk kebutuhan Printing, Advertising & Packaging',
        'url' => url('/'),
        'logo' => asset('images/logo-clean.png'),
        'image' => asset('images/logo-clean.png'),
        'telephone' => $__contact['contact_phone'] ?? '',
        'email' => $__contact['contact_email'] ?? '',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $__contact['contact_address'] ?? '',
            'addressCountry' => 'ID',
        ],
        'openingHours' => $__contact['contact_hours'] ?? 'Mo-Sa 08:00-17:00',
        'sameAs' => $__socials,
        'priceRange' => '$$',
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
    </script>
    {{-- Additional page-specific structured data --}}
    @stack('structured_data')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favico.png') }}">
    <script src="https://unpkg.com/lucide@0.460.0/dist/umd/lucide.js"></script>

    <style>
        :root {
            --navy: #17335F;
            --navy-dark: #0e213f;
            --navy-light: #1e4480;
            --navy-rgb: 23, 51, 95;
            --red: #F2383D;
            --red-dark: #d42a2f;
            --red-light: #ff5a5f;
            --red-rgb: 242, 56, 61;
            --cream: #F5F2EC;
            --beige: #E9E3DC;
            --charcoal: #25262A;
            --charcoal-light: #555;
            --white: #ffffff;
            --font-primary: 'Plus Jakarta Sans', sans-serif;
            --font-display: 'Space Grotesk', sans-serif;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.06);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 32px rgba(0,0,0,0.10);
            --shadow-xl: 0 16px 48px rgba(0,0,0,0.14);
            --shadow-red: 0 8px 24px rgba(var(--red-rgb), 0.3);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --radius-xl: 28px;
            --radius-full: 9999px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-fast: all 0.15s ease;
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; font-size: 16px; }
        body {
            font-family: var(--font-primary);
            color: var(--charcoal);
            background: var(--cream);
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }
        img { max-width: 100%; height: auto; display: block; }
        a { text-decoration: none; color: inherit; }
        ul, ol { list-style: none; }
        .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 24px; }

        /* ANIMATIONS */
        @keyframes fadeInUp { from { opacity:0; transform:translateY(40px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeInLeft { from { opacity:0; transform:translateX(-40px); } to { opacity:1; transform:translateX(0); } }
        @keyframes fadeInRight { from { opacity:0; transform:translateX(40px); } to { opacity:1; transform:translateX(0); } }
        @keyframes float { 0%,100% { transform:translateY(0); } 50% { transform:translateY(-12px); } }
        @keyframes pulse { 0%,100% { transform:scale(1); } 50% { transform:scale(1.05); } }
        @keyframes slideInNav { from { opacity:0; transform:translateY(-20px); } to { opacity:1; transform:translateY(0); } }
        @keyframes marquee { 0% { transform:translateX(0); } 100% { transform:translateX(-50%); } }
        @keyframes countUp { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }

        .animate-on-scroll { opacity:0; transform:translateY(40px); transition: opacity 0.7s cubic-bezier(0.4,0,0.2,1), transform 0.7s cubic-bezier(0.4,0,0.2,1); }
        .animate-on-scroll.visible { opacity:1; transform:translateY(0); }
        .animate-delay-1 { transition-delay:0.1s; }
        .animate-delay-2 { transition-delay:0.2s; }
        .animate-delay-3 { transition-delay:0.3s; }
        .animate-delay-4 { transition-delay:0.4s; }

        /* TOPBAR */
        .topbar {
            background: var(--navy);
            color: rgba(255,255,255,0.85);
            font-size: 0.8rem;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .topbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar-left, .topbar-right { display: flex; align-items: center; gap: 20px; }
        .topbar-item { display: flex; align-items: center; gap: 6px; }
        .topbar-item i { color: var(--red); }
        .topbar-social { display: flex; gap: 12px; }
        .topbar-social a {
            width: 28px; height: 28px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.7);
            transition: var(--transition-fast);
        }
        .topbar-social a:hover { background: var(--red); color: white; }

        /* NAVBAR */
        .navbar {
            position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;
            padding: 14px 0;
            transition: var(--transition);
            animation: slideInNav 0.6s ease-out;
            background: transparent;
        }
        .navbar.has-topbar { top: 40px; }
        .navbar.scrolled {
            top: 0;
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow-md);
            padding: 10px 0;
        }
        .navbar .container { display: flex; align-items: center; justify-content: space-between; }
        .navbar-logo img { height: 42px; width: auto; transition: var(--transition); }
        .navbar-logo:hover img { transform: scale(1.05); }
        .navbar-menu { display: flex; align-items: center; gap: 4px; }
        .navbar-link {
            padding: 10px 18px;
            font-weight: 500; font-size: 0.88rem;
            color: rgba(255,255,255,0.85);
            border-radius: var(--radius-full);
            transition: var(--transition);
            position: relative;
            background: rgba(255,255,255,0.08);
        }
        .navbar-link:hover { color: white; background: rgba(255,255,255,0.18); }
        .navbar-link.active { color: white; background: rgba(255,255,255,0.18); }
        .navbar.scrolled .navbar-link { color: var(--charcoal); background: rgba(0,0,0,0.04); }
        .navbar.scrolled .navbar-link:hover { color: var(--navy); background: rgba(0,0,0,0.08); }
        .navbar.scrolled .navbar-link.active { color: var(--red); background: rgba(var(--red-rgb), 0.08); }
        .navbar-cta {
            padding: 10px 24px;
            background: var(--red); color: var(--white);
            font-weight: 600; font-size: 0.88rem;
            border-radius: var(--radius-full);
            transition: var(--transition);
            border: none; cursor: pointer;
            display: inline-flex; align-items: center; gap: 6px;
            margin-left: 8px;
        }
        .navbar-cta:hover { background: var(--red-dark); transform: translateY(-2px); box-shadow: var(--shadow-red); }
        .navbar-toggle {
            display: none; flex-direction: column; gap: 5px;
            background: none; border: none; cursor: pointer; padding: 8px; z-index: 1001;
        }
        .navbar-toggle span { display: block; width: 24px; height: 2px; background: var(--charcoal); border-radius: 2px; transition: var(--transition); }
        .navbar-toggle.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .navbar-toggle.active span:nth-child(2) { opacity: 0; }
        .navbar-toggle.active span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

        /* BUTTONS */
        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 14px 32px; font-family: var(--font-primary);
            font-weight: 600; font-size: 0.92rem;
            border-radius: var(--radius-full); border: none; cursor: pointer;
            transition: var(--transition); text-align: center; justify-content: center;
        }
        .btn-primary { background: var(--red); color: var(--white); }
        .btn-primary:hover { background: var(--red-dark); transform: translateY(-3px); box-shadow: var(--shadow-red); }
        .btn-secondary { background: var(--white); color: var(--navy); border: 2px solid var(--beige); }
        .btn-secondary:hover { border-color: var(--navy); transform: translateY(-3px); box-shadow: var(--shadow-md); }
        .btn-navy { background: var(--navy); color: var(--white); }
        .btn-navy:hover { background: var(--navy-dark); transform: translateY(-3px); box-shadow: var(--shadow-lg); }
        .btn-outline-white { background: transparent; color: var(--white); border: 2px solid rgba(255,255,255,0.3); }
        .btn-outline-white:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); transform: translateY(-3px); }
        .btn-lg { padding: 16px 40px; font-size: 1rem; }
        .btn-sm { padding: 10px 20px; font-size: 0.85rem; }

        /* SECTION COMMON */
        .section { padding: 100px 0; }
        .section-header { text-align: center; margin-bottom: 60px; }
        .section-badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 6px 16px; background: rgba(var(--red-rgb), 0.08);
            color: var(--red); font-weight: 600; font-size: 0.78rem;
            border-radius: var(--radius-full); text-transform: uppercase; letter-spacing: 1.5px;
            margin-bottom: 16px;
        }
        .section-title {
            font-family: var(--font-display); font-size: 2.6rem; font-weight: 700;
            color: var(--navy); line-height: 1.2; margin-bottom: 16px;
        }
        .section-subtitle { font-size: 1.05rem; color: var(--charcoal-light); max-width: 560px; margin: 0 auto; line-height: 1.7; }

        /* PAGE HERO */
        .page-hero {
            background: linear-gradient(135deg, var(--navy) 0%, #0a182f 100%);
            padding: 160px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .page-hero::before {
            content: '';
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 0);
            background-size: 24px 24px;
            opacity: 0.8;
        }
        .page-hero-title {
            font-family: var(--font-display);
            font-size: 3rem; font-weight: 700;
            color: white; margin-bottom: 16px;
            position: relative; z-index: 2;
        }
        .page-hero-title span { color: var(--red); }
        .page-hero-desc {
            color: rgba(255,255,255,0.8);
            font-size: 1.1rem; line-height: 1.6;
            max-width: 600px; margin: 0 auto;
            position: relative; z-index: 2;
        }

        /* RESPONSIVE BASE */
        @media (max-width: 1024px) {
            .section-title { font-size: 2rem; }
            .section { padding: 80px 0; }
        }
        @media (max-width: 768px) {
            .topbar { display: none; }
            .navbar.has-topbar { top: 0; }
            .section-title { font-size: 1.7rem; }
            .section { padding: 60px 0; }
            .container { padding: 0 20px; }
            .navbar-menu {
                position: fixed; top: 0; right: -100%; width: 280px; height: 100vh;
                background: var(--white); flex-direction: column; padding: 100px 32px 40px;
                gap: 4px; box-shadow: -8px 0 32px rgba(0,0,0,0.1); transition: var(--transition-slow);
                align-items: stretch;
            }
            .navbar-menu.open { right: 0; }
            .navbar-toggle { display: flex; }
            .navbar-toggle span { background: white; }
            .navbar.scrolled .navbar-toggle span { background: var(--charcoal); }
            .navbar-link { padding: 14px 16px; border-radius: var(--radius-md); color: var(--charcoal); }
            .navbar-link:hover { background: var(--cream); color: var(--navy); }
            .navbar-link::after { display: none; }
            .navbar-cta { margin: 12px 0 0; text-align: center; justify-content: center; }
        }
        @media (max-width: 480px) { .section-title { font-size: 1.5rem; } }
    </style>
    {{-- Google Analytics --}}
    @php $__gaId = \App\Models\SiteSetting::where('key', 'ga_measurement_id')->value('value'); @endphp
    @if($__gaId)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $__gaId }}"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','{{ $__gaId }}');</script>
    @endif

    @yield('styles')
</head>
<body>
    {{-- TOPBAR --}}
    <div class="topbar" id="topbar">
        <div class="container">
            <div class="topbar-left">
                <span class="topbar-item">
                    <i data-lucide="map-pin" style="width:13px;height:13px;"></i>
                    {{ $siteSettings['contact']['contact_address'] ?? 'Jl. Percetakan No. 123, Jakarta' }}
                </span>
                <span class="topbar-item">
                    <i data-lucide="clock" style="width:13px;height:13px;"></i>
                    {{ $siteSettings['contact']['contact_hours'] ?? 'Senin - Sabtu, 08:00 - 17:00' }}
                </span>
            </div>
            <div class="topbar-right">
                <span class="topbar-item">
                    <i data-lucide="phone" style="width:13px;height:13px;"></i>
                    {{ $siteSettings['contact']['contact_phone'] ?? '+62 812-3456-7890' }}
                </span>
                <span class="topbar-item">
                    <i data-lucide="mail" style="width:13px;height:13px;"></i>
                    {{ $siteSettings['contact']['contact_email'] ?? 'info@cetako.com' }}
                </span>
                <div class="topbar-social">
                    @if(!empty($siteSettings['social']['social_instagram']))
                        <a href="{{ $siteSettings['social']['social_instagram'] }}" aria-label="Instagram" target="_blank"><i data-lucide="instagram" style="width:14px;height:14px;"></i></a>
                    @endif
                    @if(!empty($siteSettings['social']['social_facebook']))
                        <a href="{{ $siteSettings['social']['social_facebook'] }}" aria-label="Facebook" target="_blank"><i data-lucide="facebook" style="width:14px;height:14px;"></i></a>
                    @endif
                    @if(!empty($siteSettings['social']['social_youtube']))
                        <a href="{{ $siteSettings['social']['social_youtube'] }}" aria-label="Youtube" target="_blank"><i data-lucide="youtube" style="width:14px;height:14px;"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- NAVBAR --}}
    <nav class="navbar has-topbar" id="navbar">
        <div class="container">
            <a href="{{ request()->is('/') ? '#hero' : '/#hero' }}" class="navbar-logo">
                <img src="{{ asset('images/logo-clean.png') }}" alt="Cetako Logo">
            </a>
            <div class="navbar-menu" id="navbarMenu">
                <a href="/" class="navbar-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                <a href="/tentang" class="navbar-link {{ request()->is('tentang') ? 'active' : '' }}">Tentang</a>
                <a href="/layanan" class="navbar-link {{ request()->is('layanan') ? 'active' : '' }}">Layanan</a>
                <a href="/produk" class="navbar-link {{ request()->is('produk') || request()->is('produk/*') ? 'active' : '' }}">Produk</a>
                <a href="/portofolio" class="navbar-link {{ request()->is('portofolio') ? 'active' : '' }}">Portofolio</a>
                <a href="/blog" class="navbar-link {{ request()->is('blog') || request()->is('blog/*') ? 'active' : '' }}">Blog</a>
                <a href="/kontak" class="navbar-cta">
                    Hubungi Kami
                    <i data-lucide="arrow-right" style="width:16px;height:16px;"></i>
                </a>
            </div>
            <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <main>
    @yield('content')
    </main>

    @yield('footer')

    <script>
        lucide.createIcons();

        const navbar = document.getElementById('navbar');
        const topbar = document.getElementById('topbar');
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY > 50;
            navbar.classList.toggle('scrolled', scrolled);
        });

        const toggle = document.getElementById('navbarToggle');
        const menu = document.getElementById('navbarMenu');
        toggle.addEventListener('click', () => {
            toggle.classList.toggle('active');
            menu.classList.toggle('open');
        });
        document.querySelectorAll('.navbar-link, .navbar-cta').forEach(link => {
            link.addEventListener('click', () => {
                toggle.classList.remove('active');
                menu.classList.remove('open');
            });
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('visible');
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

        // Counter animation
        function animateCounter(el) {
            const target = parseInt(el.getAttribute('data-target'));
            const suffix = el.getAttribute('data-suffix') || '';
            const duration = 2000;
            const start = performance.now();
            function update(now) {
                const elapsed = now - start;
                const progress = Math.min(elapsed / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.floor(target * eased) + suffix;
                if (progress < 1) requestAnimationFrame(update);
            }
            requestAnimationFrame(update);
        }
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    entry.target.classList.add('counted');
                    animateCounter(entry.target);
                }
            });
        }, { threshold: 0.5 });
        document.querySelectorAll('[data-target]').forEach(el => counterObserver.observe(el));
    </script>
    @yield('scripts')
</body>
</html>
