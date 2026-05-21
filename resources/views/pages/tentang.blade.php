@extends('layouts.app')
@section('title', 'Tentang Kami - Cetako')
@section('meta_description', 'Cetako adalah perusahaan percetakan profesional dengan pengalaman lebih dari 8 tahun melayani ratusan klien dari berbagai industri di Indonesia.')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<style>
    .about-intro { padding: 80px 0; background: var(--white); }
    .about-intro-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
    .about-intro-img { border-radius: var(--radius-xl); overflow: visible; position: relative; }
    .about-intro-img img { width: 100%; height: auto; object-fit: contain; border-radius: var(--radius-xl); }
    .about-intro-text h2 { font-family: var(--font-display); font-size: 2.2rem; font-weight: 700; color: var(--navy); margin-bottom: 20px; line-height: 1.3; }
    .about-intro-text p { color: var(--charcoal-light); line-height: 1.8; margin-bottom: 16px; font-size: 1rem; }

    .vision-mission { padding: 80px 0; }
    .vm-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 32px; }
    .vm-card { background: var(--white); border-radius: var(--radius-lg); padding: 40px; border: 1px solid var(--beige); }
    .vm-card-icon { width: 56px; height: 56px; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; }
    .vm-card h3 { font-family: var(--font-display); font-size: 1.4rem; font-weight: 700; color: var(--navy); margin-bottom: 16px; }
    .vm-card p { color: var(--charcoal-light); line-height: 1.8; }
    .vm-card ul { margin-top: 12px; }
    .vm-card li { color: var(--charcoal-light); line-height: 1.8; padding: 6px 0; padding-left: 24px; position: relative; }
    .vm-card li::before { content: '✓'; position: absolute; left: 0; color: var(--red); font-weight: 700; }

    .values-section { padding: 80px 0; background: var(--white); }
    .values-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-top: 48px; }
    .value-card { text-align: center; padding: 32px 20px; border-radius: var(--radius-lg); border: 1px solid var(--beige); transition: var(--transition); }
    .value-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); border-color: var(--red); }
    .value-card-icon { width: 64px; height: 64px; border-radius: 16px; background: rgba(var(--red-rgb), 0.08); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; color: var(--red); }
    .value-card h4 { font-family: var(--font-display); font-size: 1.05rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .value-card p { font-size: 0.88rem; color: var(--charcoal-light); line-height: 1.6; }

    .team-section { padding: 80px 0; }
    .team-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px; margin-top: 48px; }
    .team-card { background: var(--white); border-radius: var(--radius-lg); overflow: hidden; border: 1px solid var(--beige); transition: var(--transition); text-align: center; }
    .team-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
    .team-card-avatar { width: 100%; height: 280px; background: linear-gradient(135deg, var(--navy), var(--navy-dark)); display: flex; align-items: center; justify-content: center; overflow: hidden; }
    .team-card-avatar span { font-size: 3.5rem; font-weight: 800; color: white; opacity: 0.8; }
    .team-card-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .team-card-body { padding: 24px; }
    .team-card-name { font-family: var(--font-display); font-size: 1.1rem; font-weight: 700; color: var(--navy); }
    .team-card-role { font-size: 0.85rem; color: var(--red); font-weight: 600; margin-top: 4px; }

    @media (max-width: 768px) {
        .about-intro-grid, .vm-grid { grid-template-columns: 1fr; }
        .values-grid { grid-template-columns: 1fr 1fr; }
        .team-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<section class="page-hero">
    <div class="container">
        <h1 class="page-hero-title">Tentang <span>Cetako</span></h1>
        <p class="page-hero-desc">Lebih dari sekedar percetakan — kami adalah mitra strategis untuk pertumbuhan visual brand Anda</p>
    </div>
</section>

{{-- Intro Section --}}
<section class="about-intro">
    <div class="container">
        <div class="about-intro-grid">
            <div class="about-intro-img animate-on-scroll">
                <img src="{{ asset('images/layanan.png') }}" alt="Workshop Cetako">
            </div>
            <div class="about-intro-text animate-on-scroll animate-delay-2">
                <div class="section-badge"><i data-lucide="building-2" style="width:14px;height:14px;"></i> Siapa Kami</div>
                <h2>Mitra Percetakan Profesional Sejak 2016</h2>
                <p><strong>Cetako</strong> didirikan dengan satu tujuan: memberikan solusi cetak berkualitas tinggi yang membantu bisnis tampil lebih profesional dan kompetitif di pasar.</p>
                <p>Dengan pengalaman lebih dari 8 tahun, kami telah melayani lebih dari 500 klien dari berbagai industri — mulai dari UMKM hingga perusahaan multinasional. Setiap proyek kami tangani dengan standar kualitas tertinggi dan komitmen pengerjaan tepat waktu.</p>
                <p>Didukung oleh mesin cetak berteknologi terbaru dari brand-brand terkemuka dunia, tim desainer kreatif, dan operator berpengalaman, kami siap menjadi partner percetakan terpercaya untuk bisnis Anda.</p>
            </div>
        </div>
    </div>
</section>

{{-- Visi & Misi --}}
@php
    $__aboutData = $aboutData ?? \App\Models\SiteSetting::getGroup('about');
    $__visi = $__aboutData['about_visi'] ?? 'Menjadi perusahaan percetakan terdepan di Indonesia yang dikenal karena kualitas, inovasi, dan pelayanan prima. Kami ingin setiap brand yang bekerja sama dengan kami merasakan dampak positif dari visual yang kami ciptakan.';
    $__misiRaw = $__aboutData['about_misi'] ?? "Menghadirkan hasil cetak presisi dengan teknologi terkini\nMemberikan pelayanan konsultatif yang memahami kebutuhan klien\nMenjaga konsistensi kualitas di setiap proyek\nMengembangkan SDM yang kompeten dan berdedikasi\nBerkontribusi pada pertumbuhan industri kreatif Indonesia";
    $__misiList = array_filter(array_map('trim', explode("\n", $__misiRaw)));
@endphp
<section class="vision-mission">
    <div class="container">
        <div class="section-header">
            <div class="section-badge"><i data-lucide="compass" style="width:14px;height:14px;"></i> Visi & Misi</div>
            <h2 class="section-title">Arah & Tujuan Kami</h2>
        </div>
        <div class="vm-grid">
            <div class="vm-card animate-on-scroll">
                <div class="vm-card-icon" style="background:rgba(var(--red-rgb),0.08);color:var(--red);">
                    <i data-lucide="eye" style="width:28px;height:28px;"></i>
                </div>
                <h3>Visi</h3>
                <p>{{ $__visi }}</p>
            </div>
            <div class="vm-card animate-on-scroll animate-delay-2">
                <div class="vm-card-icon" style="background:rgba(var(--navy-rgb),0.08);color:var(--navy);">
                    <i data-lucide="target" style="width:28px;height:28px;"></i>
                </div>
                <h3>Misi</h3>
                <ul>
                    @foreach($__misiList as $misi)
                    <li>{{ $misi }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Nilai Perusahaan --}}
<section class="values-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge"><i data-lucide="heart" style="width:14px;height:14px;"></i> Nilai Kami</div>
            <h2 class="section-title">Prinsip yang Kami Pegang</h2>
            <p class="section-subtitle">Empat pilar yang menjadi fondasi setiap pekerjaan kami</p>
        </div>
        <div class="values-grid">
            <div class="value-card animate-on-scroll">
                <div class="value-card-icon"><i data-lucide="award" style="width:28px;height:28px;"></i></div>
                <h4>Kualitas</h4>
                <p>Tidak ada kompromi untuk kualitas. Setiap detail diperhatikan dengan seksama.</p>
            </div>
            <div class="value-card animate-on-scroll animate-delay-1">
                <div class="value-card-icon"><i data-lucide="clock" style="width:28px;height:28px;"></i></div>
                <h4>Ketepatan Waktu</h4>
                <p>Deadline adalah janji. Kami selalu menyelesaikan proyek sesuai waktu yang disepakati.</p>
            </div>
            <div class="value-card animate-on-scroll animate-delay-2">
                <div class="value-card-icon"><i data-lucide="lightbulb" style="width:28px;height:28px;"></i></div>
                <h4>Inovasi</h4>
                <p>Terus berinovasi dengan teknologi dan metode terbaru untuk hasil terbaik.</p>
            </div>
            <div class="value-card animate-on-scroll animate-delay-3">
                <div class="value-card-icon"><i data-lucide="handshake" style="width:28px;height:28px;"></i></div>
                <h4>Kepercayaan</h4>
                <p>Membangun hubungan jangka panjang berdasarkan transparansi dan integritas.</p>
            </div>
        </div>
    </div>
</section>

{{-- Tim --}}
<section class="team-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge"><i data-lucide="users" style="width:14px;height:14px;"></i> Tim Kami</div>
            <h2 class="section-title">Orang-Orang di Balik Cetako</h2>
            <p class="section-subtitle">Tim profesional yang berdedikasi untuk memberikan hasil terbaik</p>
        </div>
        <div class="team-grid">
            @php
                $aboutData = $__aboutData ?? \App\Models\SiteSetting::getGroup('about');
                $team = [];
                for ($i = 1; $i <= 3; $i++) {
                    $name = $aboutData['about_team_'.$i.'_name'] ?? null;
                    $role = $aboutData['about_team_'.$i.'_role'] ?? null;
                    $photo = $aboutData['about_team_'.$i.'_photo'] ?? null;
                    if ($name) {
                        $initials = collect(explode(' ', $name))->map(fn($w) => strtoupper(substr($w, 0, 1)))->take(2)->join('');
                        $team[] = ['name' => $name, 'role' => $role ?? '', 'initial' => $initials, 'photo' => $photo];
                    }
                }
                if (empty($team)) {
                    $team = [
                        ['name' => 'Ahmad Fauzi', 'role' => 'Founder & CEO', 'initial' => 'AF', 'photo' => null],
                        ['name' => 'Rina Susanti', 'role' => 'Head of Production', 'initial' => 'RS', 'photo' => null],
                        ['name' => 'Dimas Prasetyo', 'role' => 'Creative Director', 'initial' => 'DP', 'photo' => null],
                    ];
                }
            @endphp
            @foreach($team as $member)
            <div class="team-card animate-on-scroll">
                <div class="team-card-avatar">
                    @if($member['photo'])
                        <img src="{{ asset('storage/' . $member['photo']) }}" alt="{{ $member['name'] }}">
                    @else
                        <span>{{ $member['initial'] }}</span>
                    @endif
                </div>
                <div class="team-card-body">
                    <div class="team-card-name">{{ $member['name'] }}</div>
                    <div class="team-card-role">{{ $member['role'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.stats')
@include('partials.cta')
@endsection

@section('footer')
@include('partials.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/landing.js') }}"></script>
@endsection
