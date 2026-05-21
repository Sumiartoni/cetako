@php
    $aboutSettings = \App\Models\SiteSetting::getGroup('about');
@endphp
<section class="section about" id="tentang">
    <div class="container">
        <div class="about-grid">
            <div class="about-image animate-on-scroll">
                <div class="about-image-wrapper">
                    <img src="{{ asset('images/layanan.png') }}" alt="Tentang Cetako">
                    <div class="about-experience-badge">
                        <span class="about-exp-number" data-target="{{ $aboutSettings['about_experience_years'] ?? '8' }}" data-suffix="+">0</span>
                        <span class="about-exp-label">Tahun<br>Pengalaman</span>
                    </div>
                </div>
            </div>
            <div class="about-content animate-on-scroll animate-delay-2">
                <div class="section-badge">
                    <i data-lucide="building-2" style="width:14px;height:14px;"></i>
                    {{ $aboutSettings['about_badge'] ?? 'Tentang Kami' }}
                </div>
                <h2 class="section-title" style="text-align:left;">{{ $aboutSettings['about_title'] ?? 'Mitra Percetakan Profesional untuk Bisnis Anda' }}</h2>
                <p class="about-text">
                    {!! $aboutSettings['about_text_1'] ?? '<strong>Cetako</strong> adalah perusahaan percetakan yang berdedikasi untuk memberikan solusi cetak terbaik bagi pelaku bisnis di Indonesia. Dengan pengalaman lebih dari 8 tahun, kami telah melayani ratusan klien dari berbagai industri.' !!}
                </p>
                <p class="about-text">
                    {{ $aboutSettings['about_text_2'] ?? 'Didukung oleh mesin cetak berteknologi terbaru dan tim profesional yang berpengalaman, kami menjamin setiap produk yang keluar dari workshop kami memenuhi standar kualitas tertinggi.' }}
                </p>
                <div class="about-features">
                    <div class="about-feature">
                        <div class="about-feature-icon"><i data-lucide="target" style="width:20px;height:20px;"></i></div>
                        <div>
                            <strong>{{ $aboutSettings['about_feat_1_title'] ?? 'Presisi Tinggi' }}</strong>
                            <p>{{ $aboutSettings['about_feat_1_desc'] ?? 'Akurasi warna dan detail cetakan yang sempurna' }}</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-icon"><i data-lucide="timer" style="width:20px;height:20px;"></i></div>
                        <div>
                            <strong>{{ $aboutSettings['about_feat_2_title'] ?? 'Tepat Waktu' }}</strong>
                            <p>{{ $aboutSettings['about_feat_2_desc'] ?? 'Komitmen pengerjaan sesuai deadline yang disepakati' }}</p>
                        </div>
                    </div>
                </div>
                <a href="#kontak" class="btn btn-navy" style="margin-top:28px;">
                    Pelajari Lebih Lanjut
                    <i data-lucide="arrow-right" style="width:16px;height:16px;"></i>
                </a>
            </div>
        </div>
    </div>
</section>
