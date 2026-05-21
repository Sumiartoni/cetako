@extends('admin.layout')
@section('page-title', $article->exists ? 'Edit Artikel' : 'Artikel Baru')

@section('content')
<form method="POST"
      action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}"
      enctype="multipart/form-data">
    @csrf
    @if($article->exists) @method('PUT') @endif

    <div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start;">
        {{-- Main Content --}}
        <div>
            <div class="card" style="padding:28px;">
                <div class="form-group">
                    <label class="form-label">Judul Artikel</label>
                    <input type="text" name="title" class="form-input" placeholder="Masukkan judul artikel..." value="{{ old('title', $article->title) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Excerpt / Ringkasan</label>
                    <textarea name="excerpt" class="form-textarea" rows="3" placeholder="Ringkasan singkat artikel untuk preview...">{{ old('excerpt', $article->excerpt) }}</textarea>
                    <div class="form-hint">Maks 500 karakter. Ditampilkan di halaman blog listing.</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Konten Artikel</label>
                    <textarea name="content" class="form-textarea" rows="18" placeholder="Tulis konten artikel di sini... (HTML didukung)" style="min-height:360px;font-family:monospace;font-size:0.85rem;line-height:1.7;">{{ old('content', $article->content) }}</textarea>
                    <div class="form-hint">Anda dapat menggunakan tag HTML seperti &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;img&gt;, &lt;strong&gt;, dll.</div>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div>
            {{-- Publish --}}
            <div class="card" style="padding:24px;margin-bottom:20px;">
                <div style="font-weight:700;color:var(--navy);margin-bottom:16px;font-size:0.92rem;">Publikasi</div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" {{ old('status', $article->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $article->status) === 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Gambar Utama</label>
                    @if($article->featured_image)
                        <div style="margin-bottom:8px;">
                            <img src="{{ asset('storage/' . $article->featured_image) }}" style="border-radius:8px;max-height:120px;">
                        </div>
                    @endif
                    <input type="file" name="featured_image" class="form-input" accept="image/*">
                    <div class="form-hint">Format: JPG, PNG, WebP. Maks 2MB.</div>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">
                    <i data-lucide="save" style="width:16px;height:16px;"></i>
                    {{ $article->exists ? 'Simpan Perubahan' : 'Publikasikan' }}
                </button>
            </div>

            {{-- SEO --}}
            <div class="card" style="padding:24px;">
                <div style="font-weight:700;color:var(--navy);margin-bottom:4px;font-size:0.92rem;">SEO Settings</div>
                <div style="font-size:0.78rem;color:#94a3b8;margin-bottom:16px;">Optimasi artikel untuk mesin pencari</div>
                <div class="form-group">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-input" placeholder="Judul yang muncul di Google" value="{{ old('meta_title', $article->meta_title) }}" maxlength="70">
                    <div class="form-hint">Maks 70 karakter</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-textarea" rows="3" placeholder="Deskripsi yang muncul di hasil pencarian Google" maxlength="160" style="min-height:80px;">{{ old('meta_description', $article->meta_description) }}</textarea>
                    <div class="form-hint">Maks 160 karakter</div>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-input" placeholder="cetak, printing, packaging" value="{{ old('meta_keywords', $article->meta_keywords) }}">
                    <div class="form-hint">Pisahkan dengan koma</div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
