@extends('admin.layout')
@section('page-title', 'Dashboard')

@section('content')
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-label">Total Artikel</div>
                <div class="stat-card-value">{{ $totalArticles }}</div>
            </div>
            <div class="stat-card-icon" style="background:#eff6ff;color:#3b82f6;">
                <i data-lucide="file-text" style="width:22px;height:22px;"></i>
            </div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-label">Published</div>
                <div class="stat-card-value">{{ $publishedArticles }}</div>
            </div>
            <div class="stat-card-icon" style="background:#dcfce7;color:#22c55e;">
                <i data-lucide="check-circle" style="width:22px;height:22px;"></i>
            </div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-label">Draft</div>
                <div class="stat-card-value">{{ $draftArticles }}</div>
            </div>
            <div class="stat-card-icon" style="background:#fef3c7;color:#f59e0b;">
                <i data-lucide="edit-3" style="width:22px;height:22px;"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <span class="card-title">Artikel Terbaru</span>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm">
            <i data-lucide="plus" style="width:14px;height:14px;"></i> Artikel Baru
        </a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentArticles as $article)
                <tr>
                    <td><strong>{{ $article->title }}</strong></td>
                    <td>
                        @if($article->status === 'published')
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif
                    </td>
                    <td>{{ $article->formatted_date }}</td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline btn-sm">
                            <i data-lucide="edit" style="width:14px;height:14px;"></i> Edit
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center;color:#94a3b8;padding:40px;">
                        Belum ada artikel. <a href="{{ route('admin.articles.create') }}" style="color:var(--red);font-weight:600;">Buat artikel pertama</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
