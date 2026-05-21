@extends('admin.layout')
@section('title', 'Kelola Halaman Tentang')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Halaman Tentang Kami</h3>
    </div>
    <div style="padding:24px;">
        @if(session('success'))
            <div class="alert alert-success"><i data-lucide="check-circle" style="width:18px;height:18px;"></i> {{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.pages.tentang.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h4 style="font-size:1rem;font-weight:700;color:var(--navy);margin-bottom:16px;padding-bottom:8px;border-bottom:1px solid #e2e8f0;">📝 Section Intro</h4>

            <div class="form-group">
                <label class="form-label">Badge Text</label>
                <input type="text" name="about_badge" class="form-input" value="{{ $data['about_badge'] ?? 'Siapa Kami' }}" placeholder="Siapa Kami">
            </div>
            <div class="form-group">
                <label class="form-label">Judul</label>
                <input type="text" name="about_title" class="form-input" value="{{ $data['about_title'] ?? '' }}" placeholder="Mitra Percetakan Profesional Sejak 2016">
            </div>
            <div class="form-group">
                <label class="form-label">Paragraf 1 (bisa HTML)</label>
                <textarea name="about_text_1" class="form-textarea" rows="4">{{ $data['about_text_1'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Paragraf 2</label>
                <textarea name="about_text_2" class="form-textarea" rows="3">{{ $data['about_text_2'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Tahun Pengalaman</label>
                <input type="number" name="about_experience_years" class="form-input" value="{{ $data['about_experience_years'] ?? '8' }}" style="max-width:120px;">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Fitur 1 - Judul</label>
                    <input type="text" name="about_feat_1_title" class="form-input" value="{{ $data['about_feat_1_title'] ?? 'Presisi Tinggi' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Fitur 1 - Deskripsi</label>
                    <input type="text" name="about_feat_1_desc" class="form-input" value="{{ $data['about_feat_1_desc'] ?? '' }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Fitur 2 - Judul</label>
                    <input type="text" name="about_feat_2_title" class="form-input" value="{{ $data['about_feat_2_title'] ?? 'Tepat Waktu' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Fitur 2 - Deskripsi</label>
                    <input type="text" name="about_feat_2_desc" class="form-input" value="{{ $data['about_feat_2_desc'] ?? '' }}">
                </div>
            </div>

            <h4 style="font-size:1rem;font-weight:700;color:var(--navy);margin:32px 0 16px;padding-bottom:8px;border-bottom:1px solid #e2e8f0;">🎯 Visi & Misi</h4>

            <div class="form-group">
                <label class="form-label">Visi</label>
                <textarea name="about_visi" class="form-textarea" rows="3">{{ $data['about_visi'] ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Misi (pisahkan dengan baris baru)</label>
                <textarea name="about_misi" class="form-textarea" rows="5">{{ $data['about_misi'] ?? '' }}</textarea>
                <span class="form-hint">Satu misi per baris</span>
            </div>

            <h4 style="font-size:1rem;font-weight:700;color:var(--navy);margin:32px 0 16px;padding-bottom:8px;border-bottom:1px solid #e2e8f0;">👥 Tim Pendiri</h4>

            @for($i = 1; $i <= 3; $i++)
            <div style="background:#f8fafc;border-radius:12px;padding:16px;margin-bottom:16px;border:1px solid #e2e8f0;">
                <h5 style="font-weight:600;color:var(--navy);margin-bottom:10px;font-size:0.88rem;">Anggota {{ $i }}</h5>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" name="about_team_{{ $i }}_name" class="form-input" value="{{ $data['about_team_'.$i.'_name'] ?? '' }}" placeholder="Nama lengkap">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="about_team_{{ $i }}_role" class="form-input" value="{{ $data['about_team_'.$i.'_role'] ?? '' }}" placeholder="Founder & CEO">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Foto</label>
                    @if(!empty($data['about_team_'.$i.'_photo']))
                        <div style="margin-bottom:8px;"><img src="{{ asset('storage/' . $data['about_team_'.$i.'_photo']) }}" style="width:80px;height:80px;object-fit:cover;border-radius:50%;border:2px solid #e2e8f0;"></div>
                    @endif
                    <input type="file" name="about_team_{{ $i }}_photo" class="form-input" accept="image/*">
                    <span class="form-hint">Format: JPG/PNG, maks 2MB. Rasio 1:1 (persegi) disarankan.</span>
                </div>
            </div>
            @endfor
            <span class="form-hint">Kosongkan jika tidak ingin menampilkan anggota tim</span>

            <div style="margin-top:32px;">
                <button type="submit" class="btn btn-primary"><i data-lucide="save" style="width:16px;height:16px;"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
