@extends('layouts.app')
@section('title', $product->name . ' - Produk Cetako')
@section('meta_description', Str::limit(strip_tags($product->description ?? 'Produk percetakan berkualitas dari Cetako: ' . $product->name), 155))
@section('meta_image', $product->image ? asset($product->image) : asset('images/logo-clean.png'))
@section('canonical', route('produk.show', $product->slug))

@push('structured_data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => $product->name,
    'description' => Str::limit(strip_tags($product->description ?? ''), 200),
    'image' => $product->image ? asset($product->image) : asset('images/logo-clean.png'),
    'category' => $product->category ?? 'Percetakan',
    'brand' => ['@type' => 'Organization', 'name' => 'Cetako'],
    'offers' => [
        '@type' => 'Offer',
        'url' => route('produk.show', $product->slug),
        'priceCurrency' => 'IDR',
        'availability' => 'https://schema.org/InStock',
        'seller' => ['@type' => 'Organization', 'name' => 'Cetako'],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Produk', 'item' => route('produk.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $product->name],
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
@php
    $siteSettings = \App\Models\SiteSetting::getAll();
    $waNumber = $siteSettings['contact']['contact_whatsapp'] ?? '6281234567890';
    $waText = rawurlencode("Halo Cetako, saya tertarik dengan produk *" . $product->name . "* yang saya lihat di website Anda. Bisa tolong infokan detail lebih lanjut?");
    $waUrl = "https://api.whatsapp.com/send?phone=" . $waNumber . "&text=" . $waText;
@endphp

<section class="product-detail-section">
    <div class="container">
        {{-- Back Button --}}
        <a href="{{ route('produk.index') }}" class="btn-back">
            <i data-lucide="arrow-left" style="width:18px;height:18px;"></i>
            Kembali ke Produk
        </a>

        <div class="product-detail-grid">
            {{-- Left Column: Image --}}
            <div class="product-detail-media">
                <div class="product-image-container">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    @else
                        <div class="product-detail-no-img">
                            <i data-lucide="image" style="width:64px;height:64px;color:#94a3b8;"></i>
                            <span>Tidak ada gambar produk</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right Column: Information --}}
            <div class="product-detail-info">
                <div class="detail-category">{{ $product->category ?? 'Lainnya' }}</div>
                <h1 class="detail-title">{{ $product->name }}</h1>
                <div class="detail-price-box">
                    <span class="price-label">Harga Layanan:</span>
                    <span class="price-value">{{ $product->price ?? 'Hubungi Kami' }}</span>
                </div>

                <div class="detail-description">
                    <h3>Deskripsi & Spesifikasi</h3>
                    <div class="rich-text">
                        {!! $product->description ?? '<p>Tidak ada deskripsi untuk produk ini.</p>' !!}
                    </div>
                </div>

                <div class="detail-actions">
                    <a href="{{ $waUrl }}" target="_blank" class="btn-wa">
                        <i data-lucide="message-square" style="width:20px;height:20px;"></i>
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>
        </div>

        {{-- Related Products --}}
        @if($relatedProducts->count() > 0)
        <div class="related-section">
            <h2 class="related-title">Produk Terkait Lainnya</h2>
            <div class="related-grid">
                @foreach($relatedProducts as $rp)
                <a href="{{ route('produk.show', $rp->slug) }}" class="related-card">
                    <div class="related-img-wrap">
                        @if($rp->image)
                            <img src="{{ asset($rp->image) }}" alt="{{ $rp->name }}">
                        @else
                            <div class="related-no-img"><i data-lucide="image" style="width:24px;height:24px;color:#cbd5e1;"></i></div>
                        @endif
                    </div>
                    <div class="related-info">
                        <h4>{{ $rp->name }}</h4>
                        <div class="related-price">{{ $rp->price ?? 'Hubungi Kami' }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@section('styles')
<style>
    .product-detail-section {
        padding: 140px 0 80px;
        background: #f8fafc;
        min-height: 100vh;
    }
    .btn-back {
        display: inline-flex; align-items: center; gap: 8px;
        color: var(--navy); font-weight: 700; font-size: 0.9rem;
        text-decoration: none; margin-bottom: 32px;
        transition: all 0.2s ease;
    }
    .btn-back:hover {
        color: var(--red); transform: translateX(-3px);
    }

    .product-detail-grid {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 48px;
        background: white; border-radius: 24px;
        padding: 48px; box-shadow: 0 10px 40px rgba(0,0,0,0.02);
        border: 1px solid #f1f5f9;
        align-items: start;
    }

    /* Media Box */
    .product-image-container {
        border-radius: 16px; overflow: hidden;
        border: 1px solid #e2e8f0; background: #f8fafc;
        aspect-ratio: 1; display: flex; align-items: center; justify-content: center;
    }
    .product-image-container img {
        width: 100%; height: 100%; object-fit: cover;
    }
    .product-detail-no-img {
        display: flex; flex-direction: column; align-items: center; gap: 12px;
        color: #94a3b8; font-size: 0.9rem; font-weight: 500;
    }

    /* Info Column */
    .detail-category {
        display: inline-block; font-size: 0.78rem; font-weight: 700;
        color: white; background: var(--navy);
        padding: 6px 14px; border-radius: 99px;
        letter-spacing: 0.05em; text-transform: uppercase;
        margin-bottom: 16px;
    }
    .detail-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2.3rem; font-weight: 700;
        color: var(--navy); margin-bottom: 20px;
        line-height: 1.2;
    }
    .detail-price-box {
        background: #f8fafc; border-radius: 12px;
        padding: 16px 20px; display: flex; align-items: center;
        gap: 12px; margin-bottom: 28px;
        border: 1px solid #f1f5f9;
    }
    .price-label { color: #64748b; font-size: 0.9rem; font-weight: 500; }
    .price-value { color: var(--red); font-size: 1.4rem; font-weight: 800; }

    .detail-description { margin-bottom: 32px; }
    .detail-description h3 {
        font-size: 1.1rem; font-weight: 700; color: var(--navy);
        margin-bottom: 12px; padding-bottom: 8px;
        border-bottom: 1px solid #f1f5f9;
    }
    .rich-text {
        color: #475569; font-size: 0.95rem; line-height: 1.7;
    }
    .rich-text p { margin-bottom: 12px; }
    .rich-text ul { margin-left: 20px; margin-bottom: 12px; }
    .rich-text li { margin-bottom: 6px; }

    .btn-wa {
        display: inline-flex; align-items: center; justify-content: center;
        gap: 10px; background: #25d366; color: white;
        padding: 14px 28px; border-radius: 12px;
        font-weight: 700; font-size: 1rem; text-decoration: none;
        transition: all 0.25s ease;
        box-shadow: 0 8px 24px rgba(37, 211, 102, 0.25);
    }
    .btn-wa:hover {
        background: #20ba5a; transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(37, 211, 102, 0.35);
    }

    /* Related Section */
    .related-section { margin-top: 64px; }
    .related-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.6rem; font-weight: 700; color: var(--navy);
        margin-bottom: 24px;
    }
    .related-grid {
        display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 24px;
    }
    .related-card {
        background: white; border-radius: 16px; overflow: hidden;
        border: 1px solid #f1f5f9; text-decoration: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        transition: all 0.25s ease; display: flex; flex-direction: column;
    }
    .related-card:hover {
        transform: translateY(-4px); box-shadow: 0 12px 28px rgba(0,0,0,0.06);
    }
    .related-img-wrap { height: 160px; background: #f8fafc; }
    .related-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
    .related-no-img { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #f1f5f9; }
    .related-info { padding: 16px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between; }
    .related-info h4 { font-size: 0.95rem; font-weight: 700; color: var(--navy); margin-bottom: 6px; }
    .related-price { font-size: 0.85rem; font-weight: 700; color: var(--red); }

    @media (max-width: 991px) {
        .product-detail-grid { grid-template-columns: 1fr; gap: 32px; padding: 32px; }
    }
</style>
@endsection
