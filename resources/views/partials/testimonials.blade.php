@php
    $testimonials = \App\Models\Testimonial::active()->ordered()->get();
    if ($testimonials->isEmpty()) {
        $testimonials = collect([
            (object)['name' => 'Andi Wijaya', 'role' => 'CEO, PT. Maju Bersama', 'text' => 'Cetako memberikan hasil cetak yang luar biasa untuk company profile kami. Warna akurat, detail tajam, dan pengerjaan tepat waktu. Sangat recommended!', 'rating' => 5],
            (object)['name' => 'Sarah Putri', 'role' => 'Marketing Manager, Tokopedia', 'text' => 'Sudah 3 tahun bekerja sama dengan Cetako untuk kebutuhan cetak marketing material. Konsistensi kualitas dan pelayanan yang sangat profesional.', 'rating' => 5],
            (object)['name' => 'Budi Santoso', 'role' => 'Owner, Kopi Nusantara', 'text' => 'Packaging produk kopi kami didesain dan dicetak oleh Cetako. Hasilnya meningkatkan brand image kami secara signifikan. Terima kasih Cetako!', 'rating' => 5],
        ]);
    }
@endphp
<section class="section testimonials" id="testimonial">
    <div class="container">
        <div class="section-header">
            <div class="section-badge"><i data-lucide="message-square" style="width:14px;height:14px;"></i> Testimoni</div>
            <h2 class="section-title">Apa Kata Klien Kami?</h2>
            <p class="section-subtitle">Kepuasan klien adalah prioritas utama kami. Berikut testimoni dari beberapa klien yang telah bekerja sama.</p>
        </div>
        <div class="testimonials-grid">
            @foreach($testimonials as $i => $t)
            <div class="testimonial-card animate-on-scroll animate-delay-{{ ($i % 4) + 1 }}">
                <div class="testimonial-stars">
                    @for($s = 0; $s < $t->rating; $s++)
                    <i data-lucide="star" style="width:16px;height:16px;fill:var(--red);color:var(--red);"></i>
                    @endfor
                </div>
                <p class="testimonial-text">"{{ $t->text }}"</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">{{ substr($t->name, 0, 1) }}</div>
                    <div>
                        <strong class="testimonial-name">{{ $t->name }}</strong>
                        <span class="testimonial-role">{{ $t->role }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
