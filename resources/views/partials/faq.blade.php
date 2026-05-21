@php
    $faqs = \App\Models\Faq::active()->ordered()->get();
    if ($faqs->isEmpty()) {
        $faqs = collect([
            (object)['question' => 'Berapa lama waktu pengerjaan cetak?', 'answer' => 'Waktu pengerjaan tergantung pada jenis dan volume pesanan. Untuk cetakan digital biasanya 1-3 hari kerja, sedangkan offset printing 5-7 hari kerja. Kami juga menyediakan layanan express untuk kebutuhan mendesak.'],
            (object)['question' => 'Apakah bisa cetak dalam jumlah kecil?', 'answer' => 'Tentu! Kami melayani cetak mulai dari 1 pcs untuk digital printing. Untuk offset printing, minimum order biasanya mulai dari 500 pcs tergantung produk.'],
            (object)['question' => 'Apakah tersedia layanan desain?', 'answer' => 'Ya, kami memiliki tim desainer profesional yang siap membantu Anda membuat desain dari awal atau merevisi desain yang sudah ada. Konsultasi desain gratis!'],
            (object)['question' => 'Bagaimana cara melakukan pemesanan?', 'answer' => 'Anda bisa menghubungi kami melalui WhatsApp, email, atau datang langsung ke workshop kami. Tim kami akan membantu Anda dari konsultasi hingga pengiriman.'],
            (object)['question' => 'Apakah bisa kirim ke luar kota?', 'answer' => 'Ya, kami melayani pengiriman ke seluruh Indonesia menggunakan jasa ekspedisi terpercaya. Biaya kirim akan diinformasikan saat konfirmasi pesanan.'],
        ]);
    }
@endphp
<section class="section faq-section" id="faq">
    <div class="container">
        <div class="faq-layout">
            <div class="faq-left animate-on-scroll">
                <div class="section-badge"><i data-lucide="help-circle" style="width:14px;height:14px;"></i> FAQ</div>
                <h2 class="section-title" style="text-align:left;">Pertanyaan yang Sering Diajukan</h2>
                <p style="color:var(--charcoal-light);line-height:1.7;margin-bottom:24px;">Temukan jawaban untuk pertanyaan umum seputar layanan percetakan kami. Jika tidak menemukan jawaban, hubungi tim kami.</p>
                <a href="#kontak" class="btn btn-navy">
                    <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
                    Tanya Langsung
                </a>
            </div>
            <div class="faq-right">
                @foreach($faqs as $i => $faq)
                <div class="faq-item animate-on-scroll animate-delay-{{ ($i % 3) + 1 }}" data-faq>
                    <button class="faq-question" onclick="this.parentElement.classList.toggle('open')">
                        <span>{{ $faq->question }}</span>
                        <i data-lucide="chevron-down" style="width:20px;height:20px;" class="faq-chevron"></i>
                    </button>
                    <div class="faq-answer">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
