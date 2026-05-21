@extends('admin.layout')
@section('page-title', 'Statistik')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Angka Statistik Website</span>
        <a href="{{ route('admin.stats.create') }}" class="btn btn-primary btn-sm">
            <i data-lucide="plus" style="width:14px;height:14px;"></i> Tambah Statistik
        </a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Icon</th>
                    <th>Label</th>
                    <th>Nilai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stats as $stat)
                <tr>
                    <td>{{ $stat->sort_order }}</td>
                    <td><i data-lucide="{{ $stat->icon }}" style="width:20px;height:20px;color:var(--navy);"></i></td>
                    <td><strong>{{ $stat->label }}</strong></td>
                    <td>{{ number_format($stat->value) }}{{ $stat->suffix }}</td>
                    <td>
                        @if($stat->is_active)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-warning">Nonaktif</span>
                        @endif
                    </td>
                    <td style="display:flex;gap:6px;">
                        <a href="{{ route('admin.stats.edit', $stat) }}" class="btn btn-outline btn-sm">
                            <i data-lucide="edit" style="width:14px;height:14px;"></i>
                        </a>
                        <form action="{{ route('admin.stats.destroy', $stat) }}" method="POST" onsubmit="return confirm('Hapus statistik ini?')">
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
                        Belum ada statistik. <a href="{{ route('admin.stats.create') }}" style="color:var(--red);font-weight:600;">Tambah statistik pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
