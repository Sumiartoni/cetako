@extends('admin.layout')
@section('page-title', $testimonial->exists ? 'Edit Testimonial' : 'Tambah Testimonial')

@section('content')
<div class="card" style="padding:28px;max-width:700px;">
    <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}">
        @csrf
        @if($testimonial->exists) @method('PUT') @endif

        <div class="form-group">
            <label class="form-label">Nama Klien *</label>
            <input type="text" name="name" class="form-input" value="{{ old('name', $testimonial->name) }}" placeholder="Nama lengkap klien" required>
        </div>

        <div class="form-group">
            <label class="form-label">Jabatan / Perusahaan</label>
            <input type="text" name="role" class="form-input" value="{{ old('role', $testimonial->role) }}" placeholder="CEO, PT. Contoh">
        </div>

        <div class="form-group">
            <label class="form-label">Isi Testimonial *</label>
            <textarea name="text" class="form-textarea" rows="4" placeholder="Tuliskan testimoni klien..." required>{{ old('text', $testimonial->text) }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Rating (1-5) *</label>
                <select name="rating" class="form-select">
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>{{ $i }} Bintang</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Urutan</label>
                <input type="number" name="sort_order" class="form-input" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" min="0">
                <div class="form-hint">Angka kecil tampil lebih dulu</div>
            </div>
        </div>

        <div class="form-group">
            <label style="display:flex;align-items:center;gap:8px;cursor:pointer;">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                <span class="form-label" style="margin:0;">Tampilkan di website</span>
            </label>
        </div>

        <div style="display:flex;gap:12px;margin-top:24px;">
            <button type="submit" class="btn btn-primary">
                <i data-lucide="save" style="width:16px;height:16px;"></i>
                {{ $testimonial->exists ? 'Perbarui' : 'Simpan' }}
            </button>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
