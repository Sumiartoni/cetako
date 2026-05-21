@extends('layouts.app')
@section('title', 'Produk & Layanan Percetakan - Cetako')
@section('meta_description', 'Temukan berbagai solusi percetakan berkualitas tinggi: digital printing, advertising, packaging, desain grafis, offset printing, dan merchandise custom.')
@section('canonical', route('produk.index'))

@push('structured_data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Produk & Layanan Cetako',
    'description' => 'Berbagai solusi percetakan berkualitas tinggi dengan teknologi mutakhir',
    'url' => route('produk.index'),
    'provider' => ['@type' => 'Organization', 'name' => 'Cetako'],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Produk'],
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<section class="products-hero">
    <div class="hero-bg-pattern"></div>
    <div class="container">
        <h1 class="products-hero-title">Produk & <span>Layanan Kami</span></h1>
        <p class="products-hero-desc">
            Temukan berbagai macam solusi percetakan berkualitas tinggi dengan teknologi mutakhir dan pengerjaan presisi untuk kebutuhan bisnis Anda.
        </p>
    </div>
</section>

<section class="section products-section">
    <div class="container">
        {{-- Category Filters --}}
        <div class="category-filters">
            <button class="filter-btn active" data-category="all">Semua Produk</button>
            <button class="filter-btn" data-category="Digital Printing">Digital Printing</button>
            <button class="filter-btn" data-category="Advertising">Advertising</button>
            <button class="filter-btn" data-category="Packaging">Packaging</button>
            <button class="filter-btn" data-category="Desain Grafis">Desain Grafis</button>
            <button class="filter-btn" data-category="Offset Printing">Offset Printing</button>
            <button class="filter-btn" data-category="Merchandise">Merchandise</button>
        </div>

        {{-- Products Grid --}}
        <div class="products-grid">
            @forelse($products as $product)
            <div class="product-card" data-category="{{ $product->category ?? 'Lainnya' }}">
                <div class="product-badge">{{ $product->category ?? 'Lainnya' }}</div>
                <div class="product-img-wrap">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    @else
                        <div class="product-no-img">
                            <i data-lucide="image" style="width:40px;height:40px;color:#94a3b8;"></i>
                        </div>
                    @endif
                </div>
                <div class="product-info">
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <p class="product-desc">{{ Str::limit(strip_tags($product->description), 100) }}</p>
                    <div class="product-footer">
                        <div class="product-price">{{ $product->price ?? 'Hubungi Kami' }}</div>
                        <a href="{{ route('produk.show', $product->slug) }}" class="btn-detail">
                            Detail <i data-lucide="arrow-right" style="width:16px;height:16px;"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i data-lucide="shopping-bag" style="width:64px;height:64px;color:#cbd5e1;margin-bottom:16px;"></i>
                <h3>Belum Ada Produk</h3>
                <p>Kami sedang mempersiapkan produk-produk terbaik kami. Silakan kembali beberapa saat lagi!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@include('partials.cta')
@endsection

@section('styles')
<style>
    /* Hero Section */
    .products-hero {
        background: linear-gradient(135deg, var(--navy) 0%, #0a182f 100%);
        padding: 160px 0 100px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .products-hero .hero-bg-pattern {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: radial-gradient(rgba(255,255,255,0.05) 1px, transparent 0);
        background-size: 24px 24px;
        opacity: 0.8;
    }
    .products-hero-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 3.5rem; font-weight: 700;
        color: white; margin-bottom: 20px;
        position: relative; z-index: 2;
    }
    .products-hero-title span { color: var(--red); }
    .products-hero-desc {
        max-width: 650px; margin: 0 auto;
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.15rem; line-height: 1.6;
        position: relative; z-index: 2;
    }

    /* Category Filters */
    .category-filters {
        display: flex; flex-wrap: wrap;
        justify-content: center; gap: 10px;
        margin-bottom: 50px;
    }
    .filter-btn {
        padding: 10px 24px;
        background: white; border: 1px solid #e2e8f0;
        border-radius: 9999px;
        color: var(--charcoal); font-weight: 600; font-size: 0.88rem;
        cursor: pointer; transition: all 0.25s ease;
    }
    .filter-btn:hover, .filter-btn.active {
        background: var(--navy); border-color: var(--navy);
        color: white; transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(23, 51, 95, 0.15);
    }

    /* Products Grid & Cards */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 32px;
        min-height: 300px;
    }
    .product-card {
        background: white; border-radius: 20px;
        overflow: hidden; border: 1px solid #f1f5f9;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex; flex-direction: column;
        position: relative;
    }
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border-color: #e2e8f0;
    }
    .product-badge {
        position: absolute; top: 16px; left: 16px; z-index: 10;
        background: rgba(23, 51, 95, 0.95);
        backdrop-filter: blur(8px);
        color: white; font-size: 0.75rem; font-weight: 700;
        padding: 6px 14px; border-radius: 999px;
        letter-spacing: 0.05em; text-transform: uppercase;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .product-img-wrap {
        height: 220px; width: 100%; overflow: hidden;
        background: #f8fafc; position: relative;
    }
    .product-img-wrap img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 0.5s ease;
    }
    .product-card:hover .product-img-wrap img {
        transform: scale(1.06);
    }
    .product-no-img {
        width: 100%; height: 100%; display: flex;
        align-items: center; justify-content: center;
        background: #f1f5f9;
    }
    .product-info {
        padding: 24px; display: flex; flex-direction: column; flex-grow: 1;
    }
    .product-title {
        font-size: 1.25rem; font-weight: 700;
        color: var(--navy); margin-bottom: 10px;
        line-height: 1.4;
    }
    .product-desc {
        color: #64748b; font-size: 0.9rem; line-height: 1.5;
        margin-bottom: 20px; flex-grow: 1;
    }
    .product-footer {
        display: flex; align-items: center;
        justify-content: space-between;
        padding-top: 18px; border-top: 1px solid #f1f5f9;
    }
    .product-price {
        font-weight: 700; font-size: 1.05rem;
        color: var(--red);
    }
    .btn-detail {
        display: flex; align-items: center; gap: 6px;
        font-weight: 700; font-size: 0.88rem;
        color: var(--navy); text-decoration: none;
        transition: all 0.2s ease;
    }
    .btn-detail:hover {
        color: var(--red);
    }
    .btn-detail i { transition: transform 0.2s ease; }
    .btn-detail:hover i { transform: translateX(3px); }

    /* Empty & Responsive */
    .empty-state {
        grid-column: 1 / -1; text-align: center;
        padding: 80px 20px;
    }
    .empty-state h3 { font-size: 1.4rem; color: var(--navy); margin-bottom: 8px; }
    .empty-state p { color: #64748b; }

    @media (max-width: 768px) {
        .products-hero { padding: 120px 0 70px; }
        .products-hero-title { font-size: 2.3rem; }
        .products-hero-desc { font-size: 1rem; }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const productCards = document.querySelectorAll('.product-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const category = btn.dataset.category;

                productCards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'flex';
                        // Add fade in animation
                        card.style.opacity = '0';
                        setTimeout(() => {
                            card.style.transition = 'opacity 0.4s ease';
                            card.style.opacity = '1';
                        }, 50);
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection
