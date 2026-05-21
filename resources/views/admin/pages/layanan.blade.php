@extends('admin.layout')
@section('title', 'Kelola Halaman Layanan')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Halaman Layanan</h3>
    </div>
    <div style="padding:24px;">
        @if(session('success'))
            <div class="alert alert-success"><i data-lucide="check-circle" style="width:18px;height:18px;"></i> {{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.pages.layanan.update') }}" method="POST">
            @csrf

            <h4 style="font-size:1rem;font-weight:700;color:var(--navy);margin-bottom:16px;padding-bottom:8px;border-bottom:1px solid #e2e8f0;">🛠️ Daftar Layanan</h4>

            @php
                $defaultServices = [
                    1 => ['title' => 'Digital Printing', 'icon' => 'printer', 'desc' => 'Cetak digital berkualitas tinggi dengan waktu pengerjaan cepat dan minimum order rendah.'],
                    2 => ['title' => 'Advertising', 'icon' => 'megaphone', 'desc' => 'Media promosi outdoor & indoor yang eye-catching untuk meningkatkan visibilitas brand.'],
                    3 => ['title' => 'Packaging', 'icon' => 'package', 'desc' => 'Kemasan produk yang menarik dan fungsional untuk meningkatkan daya jual.'],
                    4 => ['title' => 'Desain Grafis', 'icon' => 'pen-tool', 'desc' => 'Tim desainer profesional untuk mewujudkan visual branding yang kuat.'],
                    5 => ['title' => 'Offset Printing', 'icon' => 'book-open', 'desc' => 'Cetak massal dengan harga kompetitif dan kualitas konsisten.'],
                    6 => ['title' => 'Merchandise', 'icon' => 'gift', 'desc' => 'Souvenir dan merchandise custom untuk promosi dan event.'],
                ];
            @endphp

            @for($i = 1; $i <= 6; $i++)
            <div style="background:#f8fafc;border-radius:12px;padding:20px;margin-bottom:20px;border:1px solid #e2e8f0;">
                <h5 style="font-weight:700;color:var(--navy);margin-bottom:12px;">Layanan {{ $i }}</h5>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Layanan</label>
                        <input type="text" name="service_{{ $i }}_title" class="form-input" value="{{ $data['service_'.$i.'_title'] ?? $defaultServices[$i]['title'] }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Icon (Lucide)</label>
                        <input type="text" name="service_{{ $i }}_icon" class="form-input" value="{{ $data['service_'.$i.'_icon'] ?? $defaultServices[$i]['icon'] }}">
                        <span class="form-hint">Nama icon dari lucide.dev (contoh: printer, megaphone, package)</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="service_{{ $i }}_desc" class="form-textarea" rows="2">{{ $data['service_'.$i.'_desc'] ?? $defaultServices[$i]['desc'] }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Fitur (pisahkan dengan koma)</label>
                    <input type="text" name="service_{{ $i }}_features" class="form-input" value="{{ $data['service_'.$i.'_features'] ?? '' }}" placeholder="Brosur & Flyer, Kartu Nama, Poster & Banner">
                    <span class="form-hint">Contoh: Brosur & Flyer, Kartu Nama, Poster & Banner</span>
                </div>
            </div>
            @endfor

            <h4 style="font-size:1rem;font-weight:700;color:var(--navy);margin:32px 0 16px;padding-bottom:8px;border-bottom:1px solid #e2e8f0;">💰 Paket Harga</h4>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Harga Starter</label>
                    <input type="text" name="pricing_starter_price" class="form-input" value="{{ $data['pricing_starter_price'] ?? 'Mulai 50K' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Harga Business</label>
                    <input type="text" name="pricing_business_price" class="form-input" value="{{ $data['pricing_business_price'] ?? 'Custom' }}">
                </div>
            </div>
            <div class="form-group" style="max-width:50%;">
                <label class="form-label">Harga Enterprise</label>
                <input type="text" name="pricing_enterprise_price" class="form-input" value="{{ $data['pricing_enterprise_price'] ?? 'Nego' }}">
            </div>

            <div style="margin-top:32px;">
                <button type="submit" class="btn btn-primary"><i data-lucide="save" style="width:16px;height:16px;"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
