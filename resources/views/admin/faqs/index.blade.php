@extends('admin.layout')
@section('page-title', 'FAQ')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Daftar FAQ</span>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">
            <i data-lucide="plus" style="width:14px;height:14px;"></i> Tambah FAQ
        </a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Pertanyaan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                <tr>
                    <td>{{ $faq->sort_order }}</td>
                    <td><strong>{{ Str::limit($faq->question, 60) }}</strong></td>
                    <td>
                        @if($faq->is_active)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-warning">Nonaktif</span>
                        @endif
                    </td>
                    <td style="display:flex;gap:6px;">
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-outline btn-sm">
                            <i data-lucide="edit" style="width:14px;height:14px;"></i>
                        </a>
                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" onsubmit="return confirm('Hapus FAQ ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i data-lucide="trash-2" style="width:14px;height:14px;"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center;color:#94a3b8;padding:40px;">
                        Belum ada FAQ. <a href="{{ route('admin.faqs.create') }}" style="color:var(--red);font-weight:600;">Tambah FAQ pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
