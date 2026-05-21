@php
    $ctaContact = \App\Models\SiteSetting::getGroup('contact');
@endphp
<section class="section cta-section" id="kontak">
    <div class="cta-bg-pattern"></div>
    <div class="container" style="position:relative;z-index:1;">
        <div class="cta-grid">
            <div class="cta-content animate-on-scroll">
                <h2 class="cta-title">Siap Mewujudkan Proyek Cetak Anda?</h2>
                <p class="cta-desc">Konsultasikan kebutuhan percetakan Anda dengan tim ahli kami. Gratis konsultasi dan estimasi harga!</p>
                <div class="cta-contact-items">
                    <div class="cta-contact-item">
                        <div class="cta-contact-icon"><i data-lucide="phone" style="width:20px;height:20px;"></i></div>
                        <div><strong>Telepon</strong><br>{{ $ctaContact['contact_phone'] ?? '+62 812-3456-7890' }}</div>
                    </div>
                    <div class="cta-contact-item">
                        <div class="cta-contact-icon"><i data-lucide="mail" style="width:20px;height:20px;"></i></div>
                        <div><strong>Email</strong><br>{{ $ctaContact['contact_email'] ?? 'info@cetako.com' }}</div>
                    </div>
                    <div class="cta-contact-item">
                        <div class="cta-contact-icon"><i data-lucide="map-pin" style="width:20px;height:20px;"></i></div>
                        <div><strong>Alamat</strong><br>{{ $ctaContact['contact_address'] ?? 'Jl. Percetakan No. 123, Jakarta' }}</div>
                    </div>
                </div>
            </div>
            <div class="cta-form-wrapper animate-on-scroll animate-delay-2">
                @if(session('success'))
                    <div style="background:#dcfce7;color:#16a34a;padding:12px 16px;border-radius:10px;margin-bottom:16px;font-size:0.88rem;border:1px solid #bbf7d0;">✓ {{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div style="background:#fee2e2;color:#dc2626;padding:12px 16px;border-radius:10px;margin-bottom:16px;font-size:0.88rem;border:1px solid #fecaca;">✗ {{ session('error') }}</div>
                @endif
                <form class="cta-form" action="{{ route('kontak.send') }}" method="POST">
                    @csrf
                    <h3 class="cta-form-title">Kirim Pesan</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cta_name">Nama Lengkap</label>
                            <input type="text" name="name" id="cta_name" placeholder="Nama Anda" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cta_phone">No. Telepon</label>
                            <input type="tel" name="phone" id="cta_phone" placeholder="08xxx" value="{{ old('phone') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cta_email">Email</label>
                        <input type="email" name="email" id="cta_email" placeholder="email@contoh.com" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cta_service">Layanan</label>
                        <select name="service" id="cta_service" required>
                            <option value="">Pilih Layanan</option>
                            <option>Digital Printing</option>
                            <option>Advertising</option>
                            <option>Packaging</option>
                            <option>Offset Printing</option>
                            <option>Desain Grafis</option>
                            <option>Merchandise</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cta_message">Pesan</label>
                        <textarea name="message" id="cta_message" rows="4" placeholder="Ceritakan kebutuhan Anda..." required>{{ old('message') }}</textarea>
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
