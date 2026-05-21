@extends('admin.layout')
@section('page-title', $stat->exists ? 'Edit Statistik' : 'Tambah Statistik')

@section('content')
<div class="card" style="padding:28px;max-width:700px;">
    <form method="POST" action="{{ $stat->exists ? route('admin.stats.update', $stat) : route('admin.stats.store') }}">
        @csrf
        @if($stat->exists) @method('PUT') @endif

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Label *</label>
                <input type="text" name="label" class="form-input" value="{{ old('label', $stat->label) }}" placeholder="Contoh: Klien Puas" required>
            </div>
            <div class="form-group">
                <label class="form-label">Icon Lucide *</label>
                <input type="text" name="icon" class="form-input" value="{{ old('icon', $stat->icon ?? 'star') }}" placeholder="users, file-check, printer, award" required>
                <div class="form-hint">Nama icon dari lucide.dev (contoh: users, printer, award)</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Nilai Angka *</label>
                <input type="number" name="value" class="form-input" value="{{ old('value', $stat->value) }}" placeholder="500" min="0" required>
            </div>
            <div class="form-group">
                <label class="form-label">Suffix (opsional)</label>
                <input type="text" name="suffix" class="form-input" value="{{ old('suffix', $stat->suffix) }}" placeholder="+ atau  Tahun">
                <div class="form-hint">Teks setelah angka, misal: +, Tahun, K+</div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Urutan</label>
                <input type="number" name="sort_order" class="form-input" value="{{ old('sort_order', $stat->sort_order ?? 0) }}" min="0">
                <div class="form-hint">Angka kecil tampil lebih dulu</div>
            </div>
            <div class="form-group">
                <label class="form-label">&nbsp;</label>
                <label style="display:flex;align-items:center;gap:8px;cursor:pointer;padding-top:6px;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $stat->is_active ?? true) ? 'checked' : '' }}>
                    <span>Tampilkan di website</span>
                </label>
            </div>
        </div>

        <div style="display:flex;gap:12px;margin-top:24px;">
            <button type="submit" class="btn btn-primary">
                <i data-lucide="save" style="width:16px;height:16px;"></i>
                {{ $stat->exists ? 'Perbarui' : 'Simpan' }}
            </button>
            <a href="{{ route('admin.stats.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
