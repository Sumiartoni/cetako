@extends('layouts.app')
@section('title', 'Portofolio - Cetako')
@section('meta_description', 'Lihat hasil karya dan portofolio percetakan Cetako. Berbagai proyek printing, advertising, dan packaging yang telah kami kerjakan.')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<style>
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 24px;
        padding: 60px 0;
    }
    .portfolio-card {
        border-radius: var(--radius-lg);
        overflow: hidden;
        background: var(--white);
        border: 1px solid var(--beige);
        transition: var(--transition);
    }
    .portfolio-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-lg);
    }
    .portfolio-card-img {
        height: 240px;
        background: var(--beige);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .portfolio-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .portfolio-card-body {
        padding: 20px;
    }
    .portfolio-card-title {
        font-family: var(--font-display);
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 6px;
    }
    .portfolio-card-category {
        font-size: 0.8rem;
        color: var(--red);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .portfolio-empty {
        text-align: center;
        padding: 80px 20px;
        color: var(--charcoal-light);
    }
</style>
@endsection

@section('content')
<section class="page-hero">
    <div class="container">
        <h1 class="page-hero-title">Portofolio <span>Kami</span></h1>
        <p class="page-hero-desc">Hasil karya terbaik yang telah kami kerjakan untuk berbagai klien</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="portfolio-grid">
            @php
                $portfolioItems = [
                    ['title' => 'Company Profile PT. Maju Bersama', 'category' => 'Digital Printing', 'image' => 'print.png'],
                    ['title' => 'Packaging Kopi Nusantara', 'category' => 'Packaging', 'image' => 'packaging.png'],
                    ['title' => 'Billboard Kampanye Produk', 'category' => 'Advertising', 'image' => 'layanan.png'],
                    ['title' => 'Buku Tahunan Sekolah', 'category' => 'Offset Printing', 'image' => 'order.png'],
                    ['title' => 'Neon Box Restoran', 'category' => 'Advertising', 'image' => 'atas.png'],
                    ['title' => 'Merchandise Event', 'category' => 'Merchandise', 'image' => 'qA.png'],
                ];
            @endphp
            @foreach($portfolioItems as $item)
            <div class="portfolio-card animate-on-scroll">
                <div class="portfolio-card-img">
                    <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['title'] }}">
                </div>
                <div class="portfolio-card-body">
                    <div class="portfolio-card-category">{{ $item['category'] }}</div>
                    <h3 class="portfolio-card-title">{{ $item['title'] }}</h3>
                </div>
            </div>
            @endforeach
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
