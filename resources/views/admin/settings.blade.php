@extends('admin.layout')
@section('page-title', 'Pengaturan Website')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf

    <div class="tabs">
        <button type="button" class="tab active" data-tab="company">Perusahaan</button>
        <button type="button" class="tab" data-tab="contact">Kontak</button>
        <button type="button" class="tab" data-tab="social">Media Sosial</button>
        <button type="button" class="tab" data-tab="seo">SEO</button>
        <button type="button" class="tab" data-tab="hero">Hero (Utama)</button>
        <button type="button" class="tab" data-tab="about">Tentang Kami</button>
        <button type="button" class="tab" data-tab="services">Layanan</button>
        <button type="button" class="tab" data-tab="workflow">Alur Kerja</button>
        <button type="button" class="tab" data-tab="smtp">Email / SMTP</button>
    </div>

    {{-- Company Tab --}}
    <div class="tab-content active" id="tab-company">
        <div class="card" style="padding:28px;">
            <div style="font-weight:700;color:var(--navy);margin-bottom:20px;">Informasi Perusahaan</div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nama Perusahaan</label>
                    <input type="text" name="company_name" class="form-input" value="{{ $settings['company']['company_name'] ?? 'Cetako' }}" placeholder="Cetako">
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun Berdiri</label>
                    <input type="text" name="company_year" class="form-input" value="{{ $settings['company']['company_year'] ?? '2016' }}" placeholder="2016">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Tagline</label>
                <input type="text" name="company_tagline" class="form-input" value="{{ $settings['company']['company_tagline'] ?? 'Printing, Advertising & Packaging' }}" placeholder="Tagline perusahaan">
            </div>
            <div class="form-group">
                <label class="form-label">Deskripsi Perusahaan</label>
                <textarea name="company_description" class="form-textarea" rows="4" placeholder="Deskripsi singkat perusahaan...">{{ $settings['company']['company_description'] ?? '' }}</textarea>
            </div>
        </div>
    </div>

    {{-- Contact Tab --}}
    <div class="tab-content" id="tab-contact">
        <div class="card" style="padding:28px;">
            <div style="font-weight:700;color:var(--navy);margin-bottom:20px;">Informasi Kontak</div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="contact_phone" class="form-input" value="{{ $settings['contact']['contact_phone'] ?? '' }}" placeholder="+62 812-3456-7890">
                </div>
                <div class="form-group">
                    <label class="form-label">Nomor WhatsApp</label>
                    <input type="text" name="contact_whatsapp" class="form-input" value="{{ $settings['contact']['contact_whatsapp'] ?? '' }}" placeholder="6281234567890">
                    <div class="form-hint">Format: 62xxx (tanpa + atau spasi)</div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="contact_email" class="form-input" value="{{ $settings['contact']['contact_email'] ?? '' }}" placeholder="info@cetako.com">
            </div>
            <div class="form-group">
                <label class="form-label">Alamat Lengkap</label>
                <textarea name="contact_address" class="form-textarea" rows="3" placeholder="Jl. Percetakan No. 123, Jakarta">{{ $settings['contact']['contact_address'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Jam Operasional</label>
                <input type="text" name="contact_hours" class="form-input" value="{{ $settings['contact']['contact_hours'] ?? '' }}" placeholder="Senin - Sabtu, 08:00 - 17:00">
            </div>
        </div>
    </div>

    {{-- Social Tab --}}
    <div class="tab-content" id="tab-social">
        <div class="card" style="padding:28px;">
            <div style="font-weight:700;color:var(--navy);margin-bottom:20px;">Media Sosial</div>
            <div class="form-group">
                <label class="form-label">Instagram</label>
                <input type="url" name="social_instagram" class="form-input" value="{{ $settings['social']['social_instagram'] ?? '' }}" placeholder="https://instagram.com/cetako">
            </div>
            <div class="form-group">
                <label class="form-label">Facebook</label>
                <input type="url" name="social_facebook" class="form-input" value="{{ $settings['social']['social_facebook'] ?? '' }}" placeholder="https://facebook.com/cetako">
            </div>
            <div class="form-group">
                <label class="form-label">YouTube</label>
                <input type="url" name="social_youtube" class="form-input" value="{{ $settings['social']['social_youtube'] ?? '' }}" placeholder="https://youtube.com/@cetako">
            </div>
            <div class="form-group">
                <label class="form-label">LinkedIn</label>
                <input type="url" name="social_linkedin" class="form-input" value="{{ $settings['social']['social_linkedin'] ?? '' }}" placeholder="https://linkedin.com/company/cetako">
            </div>
            <div class="form-group">
                <label class="form-label">TikTok</label>
                <input type="url" name="social_tiktok" class="form-input" value="{{ $settings['social']['social_tiktok'] ?? '' }}" placeholder="https://tiktok.com/@cetako">
            </div>
        </div>
    </div>

    {{-- SEO Tab --}}
    <div class="tab-content" id="tab-seo">
        <div class="card" style="padding:28px;">
            <div style="font-weight:700;color:var(--navy);margin-bottom:20px;">SEO Website</div>
            <div class="form-group">
                <label class="form-label">Site Title</label>
                <input type="text" name="seo_title" class="form-input" value="{{ $settings['seo']['seo_title'] ?? '' }}" placeholder="Cetako - Printing, Advertising & Packaging" maxlength="70">
                <div class="form-hint">Maks 70 karakter. Tampil di tab browser dan hasil Google.</div>
            </div>
            <div class="form-group">
                <label class="form-label">Site Description</label>
                <textarea name="seo_description" class="form-textarea" rows="3" maxlength="160" placeholder="Deskripsi singkat website untuk SEO">{{ $settings['seo']['seo_description'] ?? '' }}</textarea>
                <div class="form-hint">Maks 160 karakter</div>
            </div>
            <div class="form-group">
                <label class="form-label">Keywords</label>
                <input type="text" name="seo_keywords" class="form-input" value="{{ $settings['seo']['seo_keywords'] ?? '' }}" placeholder="percetakan, printing, packaging, advertising">
                <div class="form-hint">Pisahkan dengan koma</div>
            </div>
        </div>
    </div>

    {{-- Hero Tab --}}
    <div class="tab-content" id="tab-hero">
        <div class="card" style="padding:28px;">
            <div style="font-weight:700;color:var(--navy);margin-bottom:20px;">Halaman Paling Atas (Hero)</div>
            
            <div class="form-group">
                <label class="form-label">Badge Teks</label>
                <input type="text" name="hero_badge" class="form-input" value="{{ $settings['hero']['hero_badge'] ?? '#1 Percetakan Terpercaya di Indonesia' }}">
            </div>

            <div class="form-group">
                <label class="form-label">Judul Utama (HTML diperbolehkan)</label>
                <input type="text" name="hero_title" class="form-input" value="{{ $settings['hero']['hero_title'] ?? 'Wujudkan Ide Anda dengan <span>Cetakan Berkualitas</span> Premium' }}">
                <div class="form-hint">Gunakan &lt;span&gt;teks&lt;/span&gt; untuk memberikan warna merah khas.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Deskripsi Utama</label>
                <textarea name="hero_desc" class="form-textarea" rows="3">{{ $settings['hero']['hero_desc'] ?? 'Cetako hadir sebagai mitra terpercaya untuk kebutuhan printing, advertising, dan packaging Anda. Hasil presisi, warna akurat, dan pengerjaan tepat waktu dengan standar internasional.' }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Tombol 1 Teks</label>
                    <input type="text" name="hero_button_1_text" class="form-input" value="{{ $settings['hero']['hero_button_1_text'] ?? 'Konsultasi Gratis' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Tombol 1 Link / URL</label>
                    <input type="text" name="hero_button_1_url" class="form-input" value="{{ $settings['hero']['hero_button_1_url'] ?? '#kontak' }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Tombol 2 Teks</label>
                    <input type="text" name="hero_button_2_text" class="form-input" value="{{ $settings['hero']['hero_button_2_text'] ?? 'Lihat Layanan' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Tombol 2 Link / URL</label>
                    <input type="text" name="hero_button_2_url" class="form-input" value="{{ $settings['hero']['hero_button_2_url'] ?? '#layanan' }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Teks Kepercayaan Klien (HTML diperbolehkan)</label>
                <input type="text" name="hero_trust_text" class="form-input" value="{{ $settings['hero']['hero_trust_text'] ?? '<strong>500+ Klien</strong> sudah mempercayakan proyek cetak mereka kepada kami' }}">
            </div>

            <div style="font-weight:700;color:var(--navy);margin-top:28px;margin-bottom:16px;">Visual Badge Melayang</div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Badge 1 Judul</label>
                    <input type="text" name="hero_float_1_title" class="form-input" value="{{ $settings['hero']['hero_float_1_title'] ?? 'Kualitas Terjamin' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Badge 1 Sub-judul</label>
                    <input type="text" name="hero_float_1_desc" class="form-input" value="{{ $settings['hero']['hero_float_1_desc'] ?? 'ISO 9001 Certified' }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Badge 2 Statistik</label>
                    <input type="text" name="hero_float_2_stat" class="form-input" value="{{ $settings['hero']['hero_float_2_stat'] ?? '10K+' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Badge 2 Keterangan</label>
                    <input type="text" name="hero_float_2_desc" class="form-input" value="{{ $settings['hero']['hero_float_2_desc'] ?? 'Proyek Selesai' }}">
                </div>
            </div>
        </div>
    </div>

    {{-- About Tab --}}
    <div class="tab-content" id="tab-about">
        <div class="card" style="padding:28px;">
            <div style="font-weight:700;color:var(--navy);margin-bottom:20px;">Tentang Kami</div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Badge Bagian</label>
                    <input type="text" name="about_badge" class="form-input" value="{{ $settings['about']['about_badge'] ?? 'Tentang Kami' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun Pengalaman</label>
                    <input type="text" name="about_experience_years" class="form-input" value="{{ $settings['about']['about_experience_years'] ?? '8' }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Judul Utama Tentang Kami</label>
                <input type="text" name="about_title" class="form-input" value="{{ $settings['about']['about_title'] ?? 'Mitra Percetakan Profesional untuk Bisnis Anda' }}">
            </div>

            <div class="form-group">
                <label class="form-label">Paragraf 1 (HTML didukung)</label>
                <textarea name="about_text_1" class="form-textarea" rows="4">{{ $settings['about']['about_text_1'] ?? '<strong>Cetako</strong> adalah perusahaan percetakan yang berdedikasi untuk memberikan solusi cetak terbaik bagi pelaku bisnis di Indonesia. Dengan pengalaman lebih dari 8 tahun, kami telah melayani ratusan klien dari berbagai industri.' }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Paragraf 2</label>
                <textarea name="about_text_2" class="form-textarea" rows="4">{{ $settings['about']['about_text_2'] ?? 'Didukung oleh mesin cetak berteknologi terbaru dan tim profesional yang berpengalaman, kami menjamin setiap produk yang keluar dari workshop kami memenuhi standar kualitas tertinggi.' }}</textarea>
            </div>

            <div style="font-weight:700;color:var(--navy);margin-top:28px;margin-bottom:16px;">Dua Keunggulan Utama</div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Keunggulan 1 Judul</label>
                    <input type="text" name="about_feat_1_title" class="form-input" value="{{ $settings['about']['about_feat_1_title'] ?? 'Presisi Tinggi' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Keunggulan 1 Deskripsi</label>
                    <input type="text" name="about_feat_1_desc" class="form-input" value="{{ $settings['about']['about_feat_1_desc'] ?? 'Akurasi warna dan detail cetakan yang sempurna' }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Keunggulan 2 Judul</label>
                    <input type="text" name="about_feat_2_title" class="form-input" value="{{ $settings['about']['about_feat_2_title'] ?? 'Tepat Waktu' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Keunggulan 2 Deskripsi</label>
                    <input type="text" name="about_feat_2_desc" class="form-input" value="{{ $settings['about']['about_feat_2_desc'] ?? 'Komitmen pengerjaan sesuai deadline yang disepakati' }}">
                </div>
            </div>
        </div>
    </div>

    {{-- Services Tab --}}
    <div class="tab-content" id="tab-services">
        <div class="card" style="padding:28px;">
            <div style="font-weight:700;color:var(--navy);margin-bottom:20px;">Layanan Kami</div>

            @php
                $defaultServices = [
                    1 => ['title' => 'Digital Printing', 'icon' => 'printer', 'desc' => 'Cetak digital berkualitas tinggi untuk brosur, flyer, poster, kartu nama, dan berbagai kebutuhan promosi lainnya dengan hasil warna yang tajam.'],
                    2 => ['title' => 'Advertising', 'icon' => 'megaphone', 'desc' => 'Solusi periklanan lengkap mulai dari billboard, neon box, spanduk, banner, hingga media promosi outdoor & indoor yang eye-catching.'],
                    3 => ['title' => 'Packaging', 'icon' => 'package', 'desc' => 'Desain dan produksi kemasan produk yang menarik, fungsional, dan sesuai dengan identitas brand Anda untuk meningkatkan daya jual.'],
                    4 => ['title' => 'Desain Grafis', 'icon' => 'pen-tool', 'desc' => 'Tim desainer profesional siap membantu mewujudkan visual branding yang kuat dan berkesan untuk bisnis Anda.'],
                    5 => ['title' => 'Offset Printing', 'icon' => 'book-open', 'desc' => 'Cetak offset untuk kebutuhan produksi massal seperti buku, majalah, katalog, dan company profile dengan harga kompetitif.'],
                    6 => ['title' => 'Merchandise', 'icon' => 'gift', 'desc' => 'Produksi souvenir dan merchandise custom seperti mug, kaos, tote bag, dan berbagai produk promosi lainnya.']
                ];
            @endphp

            @for ($i = 1; $i <= 6; $i++)
            <div style="background:#f8fafc;border-radius:12px;padding:20px;margin-bottom:20px;border:1px solid #e2e8f0;">
                <div style="font-weight:700;color:var(--navy);margin-bottom:12px;font-size:0.9rem;">Layanan #{{ $i }}</div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Layanan</label>
                        <input type="text" name="service_{{ $i }}_title" class="form-input" value="{{ $settings['services']['service_' . $i . '_title'] ?? $defaultServices[$i]['title'] }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon Lucide</label>
                        <input type="text" name="service_{{ $i }}_icon" class="form-input" value="{{ $settings['services']['service_' . $i . '_icon'] ?? $defaultServices[$i]['icon'] }}">
                        <div class="form-hint">Format icon: printer, megaphone, package, pen-tool, book-open, gift</div>
                    </div>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Deskripsi Layanan</label>
                    <textarea name="service_{{ $i }}_desc" class="form-textarea" rows="2">{{ $settings['services']['service_' . $i . '_desc'] ?? $defaultServices[$i]['desc'] }}</textarea>
                </div>
            </div>
            @endfor
        </div>
    </div>

    {{-- Workflow Tab --}}
    <div class="tab-content" id="tab-workflow">
        <div class="card" style="padding:28px;">
            <div style="font-weight:700;color:var(--navy);margin-bottom:20px;">Alur Kerja</div>

            <div class="form-group">
                <label class="form-label">Sub-judul Alur Kerja</label>
                <input type="text" name="workflow_subtitle" class="form-input" value="{{ $settings['workflow']['workflow_subtitle'] ?? 'Empat langkah sederhana untuk mendapatkan hasil cetakan terbaik.' }}">
            </div>

            @php
                $defaultSteps = [
                    1 => ['title' => 'Konsultasi & Order', 'desc' => 'Hubungi kami untuk konsultasi kebutuhan cetak Anda. Tim kami siap memberikan rekomendasi terbaik.'],
                    2 => ['title' => 'Desain & Approval', 'desc' => 'Tim desainer kami membuatkan layout dan menunggu persetujuan Anda sebelum masuk produksi.'],
                    3 => ['title' => 'Proses Produksi', 'desc' => 'Produksi dikerjakan dengan mesin modern dan melalui quality control yang ketat di setiap tahap.'],
                    4 => ['title' => 'Packaging & Delivery', 'desc' => 'Hasil cetak dikemas rapi dengan perlindungan maksimal dan dikirim tepat waktu ke lokasi Anda.']
                ];
            @endphp

            @for ($i = 1; $i <= 4; $i++)
            <div style="background:#f8fafc;border-radius:12px;padding:20px;margin-bottom:20px;border:1px solid #e2e8f0;">
                <div style="font-weight:700;color:var(--navy);margin-bottom:12px;font-size:0.9rem;">Langkah #{{ $i }}</div>
                <div class="form-group">
                    <label class="form-label">Judul Langkah</label>
                    <input type="text" name="workflow_{{ $i }}_title" class="form-input" value="{{ $settings['workflow']['workflow_' . $i . '_title'] ?? $defaultSteps[$i]['title'] }}">
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Deskripsi Langkah</label>
                    <textarea name="workflow_{{ $i }}_desc" class="form-textarea" rows="2">{{ $settings['workflow']['workflow_' . $i . '_desc'] ?? $defaultSteps[$i]['desc'] }}</textarea>
                </div>
            </div>
            @endfor
        </div>
    </div>

    {{-- SMTP Tab --}}
    <div class="tab-content" id="tab-smtp">
        <div class="card" style="padding:28px;">
            <div style="font-weight:700;color:var(--navy);margin-bottom:20px;">Konfigurasi Email (SMTP)</div>
            <p style="font-size:0.85rem;color:#64748b;margin-bottom:20px;">Konfigurasi ini digunakan untuk mengirim email dari form kontak website ke email Anda.</p>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">SMTP Host</label>
                    <input type="text" name="smtp_host" class="form-input" value="{{ $settings['smtp']['smtp_host'] ?? '' }}" placeholder="mail.cetako.id">
                </div>
                <div class="form-group">
                    <label class="form-label">SMTP Port</label>
                    <input type="text" name="smtp_port" class="form-input" value="{{ $settings['smtp']['smtp_port'] ?? '465' }}" placeholder="465">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">SMTP Username</label>
                    <input type="text" name="smtp_username" class="form-input" value="{{ $settings['smtp']['smtp_username'] ?? '' }}" placeholder="noreply@cetako.id">
                </div>
                <div class="form-group">
                    <label class="form-label">SMTP Password</label>
                    <input type="password" name="smtp_password" class="form-input" value="{{ $settings['smtp']['smtp_password'] ?? '' }}" placeholder="••••••••">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Encryption</label>
                    <select name="smtp_encryption" class="form-select">
                        <option value="ssl" {{ ($settings['smtp']['smtp_encryption'] ?? 'ssl') == 'ssl' ? 'selected' : '' }}>SSL</option>
                        <option value="tls" {{ ($settings['smtp']['smtp_encryption'] ?? '') == 'tls' ? 'selected' : '' }}>TLS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Email Pengirim (From)</label>
                    <input type="email" name="smtp_from_email" class="form-input" value="{{ $settings['smtp']['smtp_from_email'] ?? '' }}" placeholder="noreply@cetako.id">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Email Penerima (Tujuan form kontak)</label>
                <input type="email" name="smtp_to_email" class="form-input" value="{{ $settings['smtp']['smtp_to_email'] ?? '' }}" placeholder="info@cetako.id">
                <div class="form-hint">Email ini akan menerima pesan dari form kontak website</div>
            </div>
        </div>
    </div>

    <div style="margin-top:20px;">
        <button type="submit" class="btn btn-primary">
            <i data-lucide="save" style="width:16px;height:16px;"></i>
            Simpan Pengaturan
        </button>
    </div>
</form>
@endsection

@section('scripts')
<script>
document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById('tab-' + tab.dataset.tab).classList.add('active');
    });
});
</script>
@endsection
