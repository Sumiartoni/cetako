@php
    $heroSettings = \App\Models\SiteSetting::getGroup('hero');
@endphp
<section class="hero" id="hero">
    <div class="hero-bg-pattern"></div>
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="hero-badge">
                    <span class="hero-badge-dot"></span>
                    {{ $heroSettings['hero_badge'] ?? '#1 Percetakan Terpercaya di Indonesia' }}
                </div>
                <h1 class="hero-title">
                    {!! $heroSettings['hero_title'] ?? 'Wujudkan Ide Anda dengan <span>Cetakan Berkualitas</span> Premium' !!}
                </h1>
                <p class="hero-desc">
                    {{ $heroSettings['hero_desc'] ?? 'Cetako hadir sebagai mitra terpercaya untuk kebutuhan printing, advertising, dan packaging Anda. Hasil presisi, warna akurat, dan pengerjaan tepat waktu dengan standar internasional.' }}
                </p>
                <div class="hero-buttons">
                    <a href="{{ $heroSettings['hero_button_1_url'] ?? '#kontak' }}" class="btn btn-primary btn-lg">
                        <i data-lucide="message-circle" style="width:18px;height:18px;"></i>
                        {{ $heroSettings['hero_button_1_text'] ?? 'Konsultasi Gratis' }}
                    </a>
                    <a href="{{ $heroSettings['hero_button_2_url'] ?? '#layanan' }}" class="btn btn-secondary btn-lg">
                        <i data-lucide="play-circle" style="width:18px;height:18px;"></i>
                        {{ $heroSettings['hero_button_2_text'] ?? 'Lihat Layanan' }}
                    </a>
                </div>
                <div class="hero-trust">
                    <div class="hero-trust-avatars">
                        <div class="avatar" style="background:#17335F;">C</div>
                        <div class="avatar" style="background:#F2383D;">A</div>
                        <div class="avatar" style="background:#25262A;">B</div>
                        <div class="avatar" style="background:#17335F;">D</div>
                    </div>
                    <div class="hero-trust-text">
                        {!! $heroSettings['hero_trust_text'] ?? '<strong>500+ Klien</strong> sudah mempercayakan proyek cetak mereka kepada kami' !!}
                    </div>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-image-card">
                    <img src="{{ asset('images/atas.png') }}" alt="Cetako - Jasa Percetakan Profesional, Printing, Advertising & Packaging Berkualitas" loading="eager">
                    <div class="hero-float-card hero-float-1">
                        <i data-lucide="check-circle" style="width:20px;height:20px;color:var(--red);"></i>
                        <div>
                            <strong>{{ $heroSettings['hero_float_1_title'] ?? 'Kualitas Terjamin' }}</strong>
                            <small>{{ $heroSettings['hero_float_1_desc'] ?? 'ISO 9001 Certified' }}</small>
                        </div>
                    </div>
                    <div class="hero-float-card hero-float-2">
                        <div class="hero-float-stat">{{ $heroSettings['hero_float_2_stat'] ?? '10K+' }}</div>
                        <small>{{ $heroSettings['hero_float_2_desc'] ?? 'Proyek Selesai' }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
