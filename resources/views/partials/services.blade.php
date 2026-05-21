@php
    $servicesSettings = \App\Models\SiteSetting::getGroup('services');
    $services = [];
    $defaultServices = [
        1 => ['title' => 'Digital Printing', 'icon' => 'printer', 'desc' => 'Cetak digital berkualitas tinggi untuk brosur, flyer, poster, kartu nama, dan berbagai kebutuhan promosi lainnya dengan hasil warna yang tajam.'],
        2 => ['title' => 'Advertising', 'icon' => 'megaphone', 'desc' => 'Solusi periklanan lengkap mulai dari billboard, neon box, spanduk, banner, hingga media promosi outdoor & indoor yang eye-catching.'],
        3 => ['title' => 'Packaging', 'icon' => 'package', 'desc' => 'Desain dan produksi kemasan produk yang menarik, fungsional, dan sesuai dengan identitas brand Anda untuk meningkatkan daya jual.'],
        4 => ['title' => 'Desain Grafis', 'icon' => 'pen-tool', 'desc' => 'Tim desainer profesional siap membantu mewujudkan visual branding yang kuat dan berkesan untuk bisnis Anda.'],
        5 => ['title' => 'Offset Printing', 'icon' => 'book-open', 'desc' => 'Cetak offset untuk kebutuhan produksi massal seperti buku, majalah, katalog, dan company profile dengan harga kompetitif.'],
        6 => ['title' => 'Merchandise', 'icon' => 'gift', 'desc' => 'Produksi souvenir dan merchandise custom seperti mug, kaos, tote bag, dan berbagai produk promosi lainnya.']
    ];

    for ($i = 1; $i <= 6; $i++) {
        $services[] = [
            'title' => $servicesSettings['service_' . $i . '_title'] ?? $defaultServices[$i]['title'],
            'icon' => $servicesSettings['service_' . $i . '_icon'] ?? $defaultServices[$i]['icon'],
            'desc' => $servicesSettings['service_' . $i . '_desc'] ?? $defaultServices[$i]['desc'],
        ];
    }
@endphp
<section class="section services" id="layanan">
    <div class="container">
        <div class="section-header">
            <div class="section-badge"><i data-lucide="layers" style="width:14px;height:14px;"></i> Layanan Kami</div>
            <h2 class="section-title">Solusi Lengkap untuk<br>Kebutuhan Cetak Anda</h2>
            <p class="section-subtitle">Dari desain hingga pengiriman, kami menangani semua kebutuhan percetakan Anda dengan standar kualitas tertinggi.</p>
        </div>
        <div class="services-grid">
            @foreach($services as $index => $s)
            @if(!empty($s['title']))
            <div class="service-card animate-on-scroll animate-delay-{{ ($index % 3) + 1 }}">
                <div class="service-card-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                <div class="service-card-icon">
                    <i data-lucide="{{ $s['icon'] }}" style="width:28px;height:28px;"></i>
                </div>
                <h3 class="service-card-title">{{ $s['title'] }}</h3>
                <p class="service-card-desc">{{ $s['desc'] }}</p>
                <a href="#kontak" class="service-card-link">
                    Selengkapnya <i data-lucide="arrow-right" style="width:14px;height:14px;"></i>
                </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
