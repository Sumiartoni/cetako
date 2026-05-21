<section class="section advantages" id="keunggulan">
    <div class="container">
        <div class="section-header">
            <div class="section-badge"><i data-lucide="shield-check" style="width:14px;height:14px;"></i> Keunggulan</div>
            <h2 class="section-title">Mengapa Memilih Cetako?</h2>
            <p class="section-subtitle">Kami berkomitmen memberikan yang terbaik untuk setiap proyek percetakan Anda.</p>
        </div>
        <div class="advantages-grid">
            @php
            $advantages = [
                ['icon' => 'zap', 'title' => 'Pengerjaan Cepat', 'desc' => 'Proses produksi efisien dengan estimasi waktu yang jelas dan pengiriman tepat waktu tanpa kompromi kualitas.'],
                ['icon' => 'shield-check', 'title' => 'Kualitas Terjamin', 'desc' => 'Menggunakan mesin cetak terkini dan bahan baku premium untuk hasil cetakan yang sempurna.'],
                ['icon' => 'wallet', 'title' => 'Harga Kompetitif', 'desc' => 'Harga bersaing tanpa mengorbankan kualitas, cocok untuk berbagai skala bisnis dari UMKM hingga korporasi.'],
                ['icon' => 'headphones', 'title' => 'Support Responsif', 'desc' => 'Tim customer service profesional siap melayani konsultasi dan pertanyaan Anda dengan respons cepat.'],
                ['icon' => 'truck', 'title' => 'Pengiriman Seluruh Indonesia', 'desc' => 'Layanan pengiriman ke seluruh wilayah Indonesia dengan packaging aman dan tracking real-time.'],
                ['icon' => 'palette', 'title' => 'Konsultasi Desain Gratis', 'desc' => 'Dapatkan saran desain dari tim kreatif kami untuk memastikan hasil cetak sesuai harapan Anda.'],
            ];
            @endphp
            @foreach($advantages as $i => $a)
            <div class="advantage-card animate-on-scroll animate-delay-{{ ($i % 3) + 1 }}">
                <div class="advantage-icon">
                    <i data-lucide="{{ $a['icon'] }}" style="width:24px;height:24px;"></i>
                </div>
                <h3 class="advantage-title">{{ $a['title'] }}</h3>
                <p class="advantage-desc">{{ $a['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
