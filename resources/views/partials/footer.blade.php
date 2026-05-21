@php
    $siteSettings = \App\Models\SiteSetting::getAll();
@endphp
<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-brand">
                <img src="{{ asset('images/logo-clean.png') }}" alt="Cetako" class="footer-logo">
                <p class="footer-brand-desc">{{ $siteSettings['company']['company_description'] ?? 'Mitra terpercaya untuk kebutuhan printing, advertising, dan packaging Anda. Kualitas terbaik dengan harga bersaing sejak 2016.' }}</p>
                <div class="footer-social">
                    @if(!empty($siteSettings['social']['social_instagram']))
                        <a href="{{ $siteSettings['social']['social_instagram'] }}" aria-label="Instagram" target="_blank"><i data-lucide="instagram" style="width:18px;height:18px;"></i></a>
                    @endif
                    @if(!empty($siteSettings['social']['social_facebook']))
                        <a href="{{ $siteSettings['social']['social_facebook'] }}" aria-label="Facebook" target="_blank"><i data-lucide="facebook" style="width:18px;height:18px;"></i></a>
                    @endif
                    @if(!empty($siteSettings['social']['social_youtube']))
                        <a href="{{ $siteSettings['social']['social_youtube'] }}" aria-label="Youtube" target="_blank"><i data-lucide="youtube" style="width:18px;height:18px;"></i></a>
                    @endif
                    @if(!empty($siteSettings['social']['social_linkedin']))
                        <a href="{{ $siteSettings['social']['social_linkedin'] }}" aria-label="Linkedin" target="_blank"><i data-lucide="linkedin" style="width:18px;height:18px;"></i></a>
                    @endif
                </div>
            </div>
            <div>
                <h4 class="footer-heading">Layanan</h4>
                <ul class="footer-links">
                    <li><a href="{{ request()->is('/') ? '#layanan' : '/#layanan' }}">Digital Printing</a></li>
                    <li><a href="{{ request()->is('/') ? '#layanan' : '/#layanan' }}">Advertising</a></li>
                    <li><a href="{{ request()->is('/') ? '#layanan' : '/#layanan' }}">Packaging</a></li>
                    <li><a href="{{ request()->is('/') ? '#layanan' : '/#layanan' }}">Desain Grafis</a></li>
                    <li><a href="{{ request()->is('/') ? '#layanan' : '/#layanan' }}">Offset Printing</a></li>
                    <li><a href="{{ request()->is('/') ? '#layanan' : '/#layanan' }}">Merchandise</a></li>
                </ul>
            </div>
            <div>
                <h4 class="footer-heading">Perusahaan</h4>
                <ul class="footer-links">
                    <li><a href="{{ request()->is('/') ? '#tentang' : '/#tentang' }}">Tentang Kami</a></li>
                    <li><a href="/produk">Produk Kami</a></li>
                    <li><a href="{{ request()->is('/') ? '#alur-kerja' : '/#alur-kerja' }}">Alur Kerja</a></li>
                    <li><a href="{{ request()->is('/') ? '#keunggulan' : '/#keunggulan' }}">Keunggulan</a></li>
                    <li><a href="{{ request()->is('/') ? '#faq' : '/#faq' }}">FAQ</a></li>
                    <li><a href="{{ request()->is('/') ? '#kontak' : '/#kontak' }}">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h4 class="footer-heading">Hubungi Kami</h4>
                <ul class="footer-contact">
                    <li><i data-lucide="map-pin" style="width:16px;height:16px;color:var(--red);min-width:16px;"></i> {{ $siteSettings['contact']['contact_address'] ?? 'Jl. Percetakan No. 123, Jakarta Selatan 12345' }}</li>
                    <li><i data-lucide="phone" style="width:16px;height:16px;color:var(--red);min-width:16px;"></i> {{ $siteSettings['contact']['contact_phone'] ?? '+62 812-3456-7890' }}</li>
                    <li><i data-lucide="mail" style="width:16px;height:16px;color:var(--red);min-width:16px;"></i> {{ $siteSettings['contact']['contact_email'] ?? 'info@cetako.com' }}</li>
                    <li><i data-lucide="clock" style="width:16px;height:16px;color:var(--red);min-width:16px;"></i> {{ $siteSettings['contact']['contact_hours'] ?? 'Senin - Sabtu, 08:00 - 17:00' }}</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} {{ $siteSettings['company']['company_name'] ?? 'Cetako' }}. All rights reserved. | {{ $siteSettings['company']['company_tagline'] ?? 'Printing, Advertising & Packaging' }}</p>
            <div class="footer-bottom-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
