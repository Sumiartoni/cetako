@extends('layouts.app')
@section('title', 'Hubungi Kami - Cetako')
@section('meta_description', 'Hubungi Cetako untuk konsultasi gratis kebutuhan percetakan Anda. Tersedia layanan digital printing, advertising, packaging, dan lainnya.')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<style>
    .contact-section { padding: 80px 0; background: var(--white); }
    .contact-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: 60px; }
    .contact-info h2 { font-family: var(--font-display); font-size: 2rem; font-weight: 700; color: var(--navy); margin-bottom: 16px; }
    .contact-info > p { color: var(--charcoal-light); line-height: 1.7; margin-bottom: 32px; }
    .contact-cards { display: flex; flex-direction: column; gap: 20px; }
    .contact-card { display: flex; gap: 16px; padding: 20px; border-radius: var(--radius-md); border: 1px solid var(--beige); transition: var(--transition); }
    .contact-card:hover { border-color: var(--red); box-shadow: var(--shadow-sm); }
    .contact-card-icon { width: 48px; height: 48px; border-radius: 12px; background: rgba(var(--red-rgb), 0.08); color: var(--red); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .contact-card-text strong { display: block; font-size: 0.92rem; color: var(--navy); margin-bottom: 4px; }
    .contact-card-text p { font-size: 0.88rem; color: var(--charcoal-light); line-height: 1.5; }
    .contact-card-text a { color: var(--red); font-weight: 600; }

    .contact-form-wrapper { background: var(--cream); border-radius: var(--radius-xl); padding: 40px; }
    .contact-form-wrapper h3 { font-family: var(--font-display); font-size: 1.4rem; font-weight: 700; color: var(--navy); margin-bottom: 24px; }
    .contact-form .form-group { margin-bottom: 20px; }
    .contact-form label { display: block; font-size: 0.85rem; font-weight: 600; color: var(--navy); margin-bottom: 6px; }
    .contact-form input, .contact-form select, .contact-form textarea {
        width: 100%; padding: 12px 16px; border: 1px solid var(--beige); border-radius: var(--radius-md);
        font-family: var(--font-primary); font-size: 0.92rem; color: var(--charcoal);
        background: var(--white); transition: var(--transition); outline: none;
    }
    .contact-form input:focus, .contact-form select:focus, .contact-form textarea:focus { border-color: var(--red); box-shadow: 0 0 0 3px rgba(var(--red-rgb), 0.08); }
    .contact-form textarea { resize: vertical; min-height: 120px; }
    .contact-form .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

    .map-section { padding: 0 0 80px; background: var(--white); }
    .map-wrapper { border-radius: var(--radius-xl); overflow: hidden; height: 350px; border: 1px solid var(--beige); background: var(--cream); display: flex; align-items: center; justify-content: center; }
    .map-placeholder { text-align: center; color: var(--charcoal-light); }
    .map-placeholder i { margin-bottom: 12px; opacity: 0.4; }

    @media (max-width: 768px) {
        .contact-grid { grid-template-columns: 1fr; }
        .contact-form .form-row { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<section class="page-hero">
    <div class="container">
        <h1 class="page-hero-title">Hubungi <span>Kami</span></h1>
        <p class="page-hero-desc">Kami siap membantu mewujudkan kebutuhan percetakan Anda. Konsultasi gratis!</p>
    </div>
</section>

@php
    $contactSettings = \App\Models\SiteSetting::getGroup('contact');
@endphp

{{-- Contact Section --}}
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info animate-on-scroll">
                <div class="section-badge"><i data-lucide="mail" style="width:14px;height:14px;"></i> Kontak</div>
                <h2>Mari Bicara Tentang Proyek Anda</h2>
                <p>Punya pertanyaan atau ingin konsultasi? Tim kami siap membantu Anda menemukan solusi percetakan terbaik. Hubungi kami melalui salah satu channel di bawah atau isi form di samping.</p>

                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="contact-card-icon"><i data-lucide="phone" style="width:22px;height:22px;"></i></div>
                        <div class="contact-card-text">
                            <strong>Telepon / WhatsApp</strong>
                            <p>{{ $contactSettings['contact_phone'] ?? '+62 812-3456-7890' }}</p>
                            <p><a href="https://wa.me/{{ $contactSettings['contact_whatsapp'] ?? '6281234567890' }}">Chat via WhatsApp →</a></p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-icon"><i data-lucide="mail" style="width:22px;height:22px;"></i></div>
                        <div class="contact-card-text">
                            <strong>Email</strong>
                            <p>{{ $contactSettings['contact_email'] ?? 'info@cetako.com' }}</p>
                            <p>Respon dalam 1x24 jam kerja</p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-icon"><i data-lucide="map-pin" style="width:22px;height:22px;"></i></div>
                        <div class="contact-card-text">
                            <strong>Alamat Workshop</strong>
                            <p>{{ $contactSettings['contact_address'] ?? 'Jl. Percetakan No. 123, Jakarta' }}</p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-icon"><i data-lucide="clock" style="width:22px;height:22px;"></i></div>
                        <div class="contact-card-text">
                            <strong>Jam Operasional</strong>
                            <p>{{ $contactSettings['contact_hours'] ?? 'Senin - Sabtu, 08:00 - 17:00' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper animate-on-scroll animate-delay-2">
                <h3>Kirim Pesan</h3>
                <form class="contact-form" onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah terkirim. Kami akan menghubungi Anda segera.');">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" placeholder="Nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">No. WhatsApp</label>
                            <input type="tel" id="phone" placeholder="08xxx" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="email@perusahaan.com" required>
                    </div>
                    <div class="form-group">
                        <label for="service">Layanan yang Dibutuhkan</label>
                        <select id="service" required>
                            <option value="">Pilih Layanan</option>
                            <option>Digital Printing</option>
                            <option>Advertising</option>
                            <option>Packaging</option>
                            <option>Offset Printing</option>
                            <option>Desain Grafis</option>
                            <option>Merchandise</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Detail Kebutuhan</label>
                        <textarea id="message" rows="5" placeholder="Ceritakan kebutuhan cetak Anda: jenis produk, jumlah, ukuran, deadline, dll..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;">
                        <i data-lucide="send" style="width:16px;height:16px;"></i>
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Map --}}
<section class="map-section">
    <div class="container">
        <div class="map-wrapper">
            <div class="map-placeholder">
                <i data-lucide="map" style="width:48px;height:48px;"></i>
                <p>Peta lokasi workshop Cetako</p>
                <p style="font-size:0.8rem;margin-top:8px;">Embed Google Maps di sini saat production</p>
            </div>
        </div>
    </div>
</section>

@include('partials.faq')
@endsection

@section('footer')
@include('partials.footer')
@endsection

@section('scripts')
<script src="{{ asset('js/landing.js') }}"></script>
@endsection
