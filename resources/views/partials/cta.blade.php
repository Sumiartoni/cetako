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
                        <div><strong>Telepon</strong><br>+62 812-3456-7890</div>
                    </div>
                    <div class="cta-contact-item">
                        <div class="cta-contact-icon"><i data-lucide="mail" style="width:20px;height:20px;"></i></div>
                        <div><strong>Email</strong><br>info@cetako.com</div>
                    </div>
                    <div class="cta-contact-item">
                        <div class="cta-contact-icon"><i data-lucide="map-pin" style="width:20px;height:20px;"></i></div>
                        <div><strong>Alamat</strong><br>Jl. Percetakan No. 123, Jakarta</div>
                    </div>
                </div>
            </div>
            <div class="cta-form-wrapper animate-on-scroll animate-delay-2">
                <form class="cta-form" onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah terkirim.');">
                    <h3 class="cta-form-title">Kirim Pesan</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" placeholder="Nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">No. Telepon</label>
                            <input type="tel" id="phone" placeholder="08xxx" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="email@contoh.com" required>
                    </div>
                    <div class="form-group">
                        <label for="service">Layanan</label>
                        <select id="service" required>
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
                        <label for="message">Pesan</label>
                        <textarea id="message" rows="4" placeholder="Ceritakan kebutuhan Anda..." required></textarea>
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
