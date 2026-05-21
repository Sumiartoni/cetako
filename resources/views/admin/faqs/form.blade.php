@extends('admin.layout')
@section('page-title', $faq->exists ? 'Edit FAQ' : 'Tambah FAQ')

@section('content')
<div class="card" style="padding:28px;max-width:700px;">
    <form method="POST" action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}">
        @csrf
        @if($faq->exists) @method('PUT') @endif

        <div class="form-group">
            <label class="form-label">Pertanyaan *</label>
            <input type="text" name="question" class="form-input" value="{{ old('question', $faq->question) }}" placeholder="Contoh: Berapa lama waktu pengerjaan?" required>
        </div>

        <div class="form-group">
            <label class="form-label">Jawaban *</label>
            <textarea name="answer" class="form-textarea" rows="5" placeholder="Tuliskan jawaban lengkap..." required>{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Urutan</label>
                <input type="number" name="sort_order" class="form-input" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" min="0">
                <div class="form-hint">Angka kecil tampil lebih dulu</div>
            </div>
            <div class="form-group">
                <label class="form-label">&nbsp;</label>
                <label style="display:flex;align-items:center;gap:8px;cursor:pointer;padding-top:6px;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}>
                    <span>Tampilkan di website</span>
                </label>
            </div>
        </div>

        <div style="display:flex;gap:12px;margin-top:24px;">
            <button type="submit" class="btn btn-primary">
                <i data-lucide="save" style="width:16px;height:16px;"></i>
                {{ $faq->exists ? 'Perbarui' : 'Simpan' }}
            </button>
            <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
