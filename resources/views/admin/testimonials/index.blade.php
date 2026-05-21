@extends('admin.layout')
@section('page-title', 'Testimonial')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Daftar Testimonial</span>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">
            <i data-lucide="plus" style="width:14px;height:14px;"></i> Tambah Testimonial
        </a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->sort_order }}</td>
                    <td><strong>{{ $testimonial->name }}</strong></td>
                    <td>{{ $testimonial->role ?? '-' }}</td>
                    <td>
                        @for($i = 0; $i < $testimonial->rating; $i++)
                            <i data-lucide="star" style="width:14px;height:14px;fill:#f59e0b;color:#f59e0b;display:inline;"></i>
                        @endfor
                    </td>
                    <td>
                        @if($testimonial->is_active)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-warning">Nonaktif</span>
                        @endif
                    </td>
                    <td style="display:flex;gap:6px;">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-outline btn-sm">
                            <i data-lucide="edit" style="width:14px;height:14px;"></i>
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Hapus testimonial ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i data-lucide="trash-2" style="width:14px;height:14px;"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;color:#94a3b8;padding:40px;">
                        Belum ada testimonial. <a href="{{ route('admin.testimonials.create') }}" style="color:var(--red);font-weight:600;">Tambah testimonial pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
