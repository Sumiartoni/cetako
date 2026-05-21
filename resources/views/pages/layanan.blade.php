@extends('layouts.app')
@section('title', 'Layanan Kami - Cetako')
@section('meta_description', 'Layanan percetakan lengkap dari Cetako: digital printing, advertising, packaging, desain grafis, offset printing, dan merchandise custom.')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<style>
    .services-detail { padding: 80px 0; background: var(--white); }
    .services-detail-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px; }
    .service-detail-card { padding: 36px; border-radius: var(--radius-lg); border: 1px solid var(--beige); transition: var(--transition); position: relative; overflow: hidden; }
    .service-detail-card::before { content: ''; position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--red); opacity: 0; transition: var(--transition); }
    .service-detail-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); border-color: transparent; }
    .service-detail-card:hover::before { opacity: 1; }
    .service-detail-icon { width: 56px; height: 56px; border-radius: 14px; background: rgba(var(--red-rgb), 0.08); color: var(--red); display: flex; align-items: center; justify-content: center; margin-bottom: 20px; }
    .service-detail-card h3 { font-family: var(--font-display); font-size: 1.2rem; font-weight: 700; color: var(--navy); margin-bottom: 12px; }
    .service-detail-card p { color: var(--charcoal-light); line-height: 1.7; font-size: 0.92rem; margin-bottom: 16px; }
    .service-detail-features { margin-top: 12px; }
    .service-detail-features li { font-size: 0.85rem; color: var(--charcoal-light); padding: 4px 0 4px 20px; position: relative; }
    .service-detail-features li::before { content: '•'; position: absolute; left: 4px; color: var(--red); font-weight: 700; }

    .process-section { padding: 80px 0; }
    .process-timeline { max-width: 700px; margin: 48px auto 0; position: relative; }
    .process-timeline::before { content: ''; position: absolute; left: 24px; top: 0; bottom: 0; width: 2px; background: var(--beige); }
    .process-step { display: flex; gap: 24px; margin-bottom: 40px; position: relative; }
    .process-step-number { width: 50px; height: 50px; border-radius: 50%; background: var(--navy); color: white; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem; flex-shrink: 0; position: relative; z-index: 2; }
    .process-step-content h4 { font-family: var(--font-display); font-size: 1.1rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .process-step-content p { color: var(--charcoal-light); line-height: 1.7; font-size: 0.92rem; }

    .pricing-section { padding: 80px 0; background: var(--white); }
    .pricing-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; margin-top: 48px; }
    .pricing-card { border-radius: var(--radius-lg); border: 1px solid var(--beige); padding: 36px; text-align: center; transition: var(--transition); }
    .pricing-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
    .pricing-card.featured { border-color: var(--red); background: linear-gradient(180deg, rgba(var(--red-rgb),0.02) 0%, var(--white) 100%); }
    .pricing-card-title { font-family: var(--font-display); font-size: 1.2rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
    .pricing-card-desc { font-size: 0.85rem; color: var(--charcoal-light); margin-bottom: 20px; }
    .pricing-card-price { font-size: 1.8rem; font-weight: 800; color: var(--red); margin-bottom: 24px; }
    .pricing-card-price span { font-size: 0.85rem; font-weight: 500; color: var(--charcoal-light); }
    .pricing-card-features { text-align: left; margin-bottom: 24px; }
    .pricing-card-features li { padding: 8px 0 8px 24px; font-size: 0.88rem; color: var(--charcoal-light); position: relative; border-bottom: 1px solid var(--cream); }
    .pricing-card-features li::before { content: '✓'; position: absolute; left: 0; color: var(--red); font-weight: 700; }

    @media (max-width: 768px) {
        .services-detail-grid, .pricing-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<section class="page-hero">
    <div class="container">
        <h1 class="page-hero-title">Layanan <span>Kami</span></h1>
        <p class="page-hero-desc">Solusi percetakan menyeluruh dengan teknologi terkini untuk setiap kebutuhan bisnis Anda</p>
    </div>
</section>

{{-- Detail Layanan --}}
<section class="services-detail">
    <div class="container">
        <div class="section-header">
            <div class="section-badge"><i data-lucide="layers" style="width:14px;height:14px;"></i> Layanan Lengkap</div>
            <h2 class="section-title">Apa yang Kami Tawarkan</h2>
            <p class="section-subtitle">Setiap layanan dirancang untuk memenuhi kebutuhan spesifik bisnis Anda</p>
        </div>
        <div class="services-detail-grid">
            @php
                $svcData = \App\Models\SiteSetting::getGroup('services');
                $defaultServices = [
                    1 => ['icon' => 'printer', 'title' => 'Digital Printing', 'desc' => 'Cetak digital berkualitas tinggi dengan waktu pengerjaan cepat dan minimum order rendah.', 'features' => 'Brosur & Flyer, Kartu Nama, Poster & Banner, Stiker & Label, Undangan'],
                    2 => ['icon' => 'megaphone', 'title' => 'Advertising', 'desc' => 'Media promosi outdoor & indoor yang eye-catching untuk meningkatkan visibilitas brand.', 'features' => 'Billboard & Baliho, Neon Box & Letter Sign, Spanduk & X-Banner, Vehicle Branding, Wall Branding'],
                    3 => ['icon' => 'package', 'title' => 'Packaging', 'desc' => 'Kemasan produk yang menarik dan fungsional untuk meningkatkan daya jual.', 'features' => 'Box & Dus Custom, Paper Bag, Pouch & Sachet, Label Produk, Packaging Food Grade'],
                    4 => ['icon' => 'pen-tool', 'title' => 'Desain Grafis', 'desc' => 'Tim desainer profesional untuk mewujudkan visual branding yang kuat.', 'features' => 'Logo & Brand Identity, Layout & Typesetting, Desain Kemasan, Social Media Design, Company Profile'],
                    5 => ['icon' => 'book-open', 'title' => 'Offset Printing', 'desc' => 'Cetak massal dengan harga kompetitif dan kualitas konsisten.', 'features' => 'Buku & Majalah, Katalog & Company Profile, Kalender & Agenda, Kop Surat & Amplop, Nota & Faktur'],
                    6 => ['icon' => 'gift', 'title' => 'Merchandise', 'desc' => 'Souvenir dan merchandise custom untuk promosi dan event.', 'features' => 'Kaos & Polo Shirt, Mug & Tumbler, Tote Bag, Payung Custom, Goodie Bag'],
                ];
                $services = [];
                for ($i = 1; $i <= 6; $i++) {
                    $title = $svcData['service_'.$i.'_title'] ?? $defaultServices[$i]['title'];
                    if (!$title) continue;
                    $featStr = $svcData['service_'.$i.'_features'] ?? $defaultServices[$i]['features'];
                    $services[] = [
                        'icon' => $svcData['service_'.$i.'_icon'] ?? $defaultServices[$i]['icon'],
                        'title' => $title,
                        'desc' => $svcData['service_'.$i.'_desc'] ?? $defaultServices[$i]['desc'],
                        'features' => array_map('trim', explode(',', $featStr)),
                    ];
                }
            @endphp
            @foreach($services as $s)
            <div class="service-detail-card animate-on-scroll">
                <div class="service-detail-icon"><i data-lucide="{{ $s['icon'] }}" style="width:26px;height:26px;"></i></div>
                <h3>{{ $s['title'] }}</h3>
                <p>{{ $s['desc'] }}</p>
                <ul class="service-detail-features">
                    @foreach($s['features'] as $f)
                    <li>{{ $f }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Proses Kerja --}}
<section class="process-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge"><i data-lucide="git-branch" style="width:14px;height:14px;"></i> Alur Kerja</div>
            <h2 class="section-title">Bagaimana Kami Bekerja</h2>
            <p class="section-subtitle">Proses yang transparan dari awal hingga akhir</p>
        </div>
        <div class="process-timeline">
            @php
                $steps = [
                    ['title' => 'Konsultasi & Briefing', 'desc' => 'Diskusikan kebutuhan Anda dengan tim kami. Kami akan memberikan rekomendasi material, ukuran, dan finishing yang tepat sesuai budget.'],
                    ['title' => 'Desain & Approval', 'desc' => 'Tim desainer membuat layout berdasarkan brief. Anda bisa request revisi hingga desain final disetujui sebelum masuk produksi.'],
                    ['title' => 'Produksi & Quality Control', 'desc' => 'Proses cetak dikerjakan dengan mesin modern. Setiap batch melewati quality control ketat untuk memastikan warna dan detail sesuai standar.'],
                    ['title' => 'Finishing & Packaging', 'desc' => 'Proses finishing (laminasi, UV, emboss, dll) dan packaging rapi dengan perlindungan maksimal untuk pengiriman.'],
                    ['title' => 'Pengiriman', 'desc' => 'Produk dikirim tepat waktu ke lokasi Anda. Tersedia pengiriman ke seluruh Indonesia dengan ekspedisi terpercaya.'],
                ];
            @endphp
            @foreach($steps as $i => $step)
            <div class="process-step animate-on-scroll">
                <div class="process-step-number">{{ $i + 1 }}</div>
                <div class="process-step-content">
                    <h4>{{ $step['title'] }}</h4>
                    <p>{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Paket Harga --}}
<section class="pricing-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge"><i data-lucide="tag" style="width:14px;height:14px;"></i> Paket Layanan</div>
            <h2 class="section-title">Pilihan Paket untuk Anda</h2>
            <p class="section-subtitle">Harga transparan tanpa biaya tersembunyi</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card animate-on-scroll">
                <div class="pricing-card-title">Starter</div>
                <div class="pricing-card-desc">Untuk kebutuhan cetak personal & UMKM</div>
                <div class="pricing-card-price">Mulai 50K <span>/ item</span></div>
                <ul class="pricing-card-features">
                    <li>Minimum order 1 pcs</li>
                    <li>Digital printing</li>
                    <li>Konsultasi gratis</li>
                    <li>Pengerjaan 1-3 hari</li>
                    <li>Revisi desain 2x</li>
                </ul>
                <a href="/kontak" class="btn btn-secondary" style="width:100%;">Hubungi Kami</a>
            </div>
            <div class="pricing-card featured animate-on-scroll animate-delay-1">
                <div class="pricing-card-title">Business</div>
                <div class="pricing-card-desc">Untuk kebutuhan korporat & event</div>
                <div class="pricing-card-price">Custom <span>/ proyek</span></div>
                <ul class="pricing-card-features">
                    <li>Volume menengah-besar</li>
                    <li>Semua jenis cetak</li>
                    <li>Dedicated account manager</li>
                    <li>Prioritas pengerjaan</li>
                    <li>Revisi desain unlimited</li>
                    <li>Free delivery Jabodetabek</li>
                </ul>
                <a href="/kontak" class="btn btn-primary" style="width:100%;">Konsultasi Gratis</a>
            </div>
            <div class="pricing-card animate-on-scroll animate-delay-2">
                <div class="pricing-card-title">Enterprise</div>
                <div class="pricing-card-desc">Untuk kebutuhan produksi massal</div>
                <div class="pricing-card-price">Nego <span>/ kontrak</span></div>
                <ul class="pricing-card-features">
                    <li>Volume besar & rutin</li>
                    <li>Harga kontrak khusus</li>
                    <li>Tim desain dedicated</li>
                    <li>SLA pengerjaan</li>
                    <li>Laporan bulanan</li>
                    <li>Free delivery nasional</li>
                </ul>
                <a href="/kontak" class="btn btn-secondary" style="width:100%;">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

@include('partials.cta')
@endsection

@section('footer')
@include('partials.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/landing.js') }}"></script>
@endsection
