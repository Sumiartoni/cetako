@extends('admin.layout')
@section('page-title', 'Artikel')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title">Semua Artikel</span>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm">
            <i data-lucide="plus" style="width:14px;height:14px;"></i> Artikel Baru
        </a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th style="width:40%">Judul</th>
                    <th>Status</th>
                    <th>SEO Title</th>
                    <th>Tanggal</th>
                    <th style="width:140px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                <tr>
                    <td>
                        <strong>{{ $article->title }}</strong>
                        <div style="font-size:0.78rem;color:#94a3b8;margin-top:2px;">/blog/{{ $article->slug }}</div>
                    </td>
                    <td>
                        @if($article->status === 'published')
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif
                    </td>
                    <td style="font-size:0.82rem;color:#64748b;">{{ Str::limit($article->meta_title, 40) }}</td>
                    <td>{{ $article->formatted_date }}</td>
                    <td>
                        <div style="display:flex;gap:6px;">
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline btn-sm">
                                <i data-lucide="edit" style="width:14px;height:14px;"></i>
                            </a>
                            @if($article->status === 'published')
                            <a href="{{ route('blog.show', $article->slug) }}" target="_blank" class="btn btn-outline btn-sm">
                                <i data-lucide="eye" style="width:14px;height:14px;"></i>
                            </a>
                            @endif
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
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
                    <td colspan="5" style="text-align:center;color:#94a3b8;padding:40px;">
                        Belum ada artikel. <a href="{{ route('admin.articles.create') }}" style="color:var(--red);font-weight:600;">Buat sekarang →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($articles->hasPages())
    <div class="pagination">
        {!! $articles->links('pagination::simple-default') !!}
    </div>
    @endif
</div>
@endsection
