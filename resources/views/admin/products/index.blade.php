@extends('admin.layout')
@section('page-title', 'Produk')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Semua Produk</span>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
            <i data-lucide="plus" style="width:14px;height:14px;"></i> Produk Baru
        </a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th style="width:80px">Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th style="width:140px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width:50px;height:50px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0;">
                        @else
                            <div style="width:50px;height:50px;background:#f1f5f9;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#94a3b8;">
                                <i data-lucide="image" style="width:20px;height:20px;"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $product->name }}</strong>
                        <div style="font-size:0.78rem;color:#94a3b8;margin-top:2px;">/produk/{{ $product->slug }}</div>
                    </td>
                    <td>
                        <span style="font-size:0.85rem;color:#475569;background:#f8fafc;padding:4px 8px;border-radius:6px;font-weight:500;">
                            {{ $product->category ?? 'Lainnya' }}
                        </span>
                    </td>
                    <td style="font-size:0.85rem;font-weight:600;color:var(--navy);">
                        {{ $product->price ?? 'Hubungi Kami' }}
                    </td>
                    <td>
                        @if($product->status === 'active')
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-warning">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;gap:6px;">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline btn-sm">
                                <i data-lucide="edit" style="width:14px;height:14px;"></i>
                            </a>
                            @if($product->status === 'active')
                            <a href="{{ route('produk.show', $product->slug) }}" target="_blank" class="btn btn-outline btn-sm">
                                <i data-lucide="eye" style="width:14px;height:14px;"></i>
                            </a>
                            @endif
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline btn-sm" style="color:var(--danger);">
                                    <i data-lucide="trash-2" style="width:14px;height:14px;"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;color:#94a3b8;padding:40px;">
                        Belum ada produk. <a href="{{ route('admin.products.create') }}" style="color:var(--red);font-weight:600;">Tambah sekarang →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($products->hasPages())
    <div class="pagination">
        {!! $products->links('pagination::simple-default') !!}
    </div>
    @endif
</div>
@endsection
