@extends('admin.layout')
@section('page-title', isset($product) && $product->exists ? 'Edit Produk' : 'Produk Baru')

@section('content')
@php
    $isEdit = isset($product) && $product->exists;
@endphp
<form method="POST"
      action="{{ $isEdit ? route('admin.products.update', $product) : route('admin.products.store') }}"
      enctype="multipart/form-data">
    @csrf
    @if($isEdit) @method('PUT') @endif

    <div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start;">
        {{-- Main Content --}}
        <div>
            <div class="card" style="padding:28px;">
                <div class="form-group">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-input" placeholder="Masukkan nama produk..." value="{{ old('name', $isEdit ? $product->name : '') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi Lengkap Produk</label>
                    <textarea name="description" class="form-textarea" rows="18" placeholder="Tulis deskripsi, spesifikasi, dan keunggulan produk di sini... (HTML didukung)" style="min-height:360px;font-family:monospace;font-size:0.85rem;line-height:1.7;">{{ old('description', $isEdit ? $product->description : '') }}</textarea>
                    <div class="form-hint">Anda dapat menggunakan tag HTML seperti &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;img&gt;, &lt;strong&gt;, dll.</div>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div>
            {{-- Publish & Settings --}}
            <div class="card" style="padding:24px;margin-bottom:20px;">
                <div style="font-weight:700;color:var(--navy);margin-bottom:16px;font-size:0.92rem;">Pengaturan Produk</div>
                
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select name="category" class="form-select">
                        <option value="Digital Printing" {{ old('category', $isEdit ? $product->category : '') === 'Digital Printing' ? 'selected' : '' }}>Digital Printing</option>
                        <option value="Advertising" {{ old('category', $isEdit ? $product->category : '') === 'Advertising' ? 'selected' : '' }}>Advertising</option>
                        <option value="Packaging" {{ old('category', $isEdit ? $product->category : '') === 'Packaging' ? 'selected' : '' }}>Packaging</option>
                        <option value="Desain Grafis" {{ old('category', $isEdit ? $product->category : '') === 'Desain Grafis' ? 'selected' : '' }}>Desain Grafis</option>
                        <option value="Offset Printing" {{ old('category', $isEdit ? $product->category : '') === 'Offset Printing' ? 'selected' : '' }}>Offset Printing</option>
                        <option value="Merchandise" {{ old('category', $isEdit ? $product->category : '') === 'Merchandise' ? 'selected' : '' }}>Merchandise</option>
                        <option value="Lainnya" {{ old('category', $isEdit ? $product->category : '') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Harga Produk</label>
                    <input type="text" name="price" class="form-input" placeholder="Contoh: Rp 10.000 / pcs atau Hubungi Kami" value="{{ old('price', $isEdit ? $product->price : '') }}">
                    <div class="form-hint">Dapat berupa tulisan atau rentang harga</div>
                </div>

                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" {{ old('status', $isEdit ? $product->status : 'active') === 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ old('status', $isEdit ? $product->status : 'active') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Gambar Produk</label>
                    @if($isEdit && $product->image)
                        <div style="margin-bottom:8px;">
                            <img src="{{ asset($product->image) }}" style="border-radius:8px;max-height:120px;width:100%;object-fit:cover;border:1px solid #e2e8f0;">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-input" accept="image/*">
                    <div class="form-hint">Format: JPG, PNG, WebP. Maks 2MB.</div>
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%;margin-top:10px;">
                    <i data-lucide="save" style="width:16px;height:16px;"></i>
                    {{ $isEdit ? 'Simpan Perubahan' : 'Tambahkan Produk' }}
                </button>
                
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline" style="width:100%;margin-top:10px;text-align:center;display:block;">
                    Batal
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
