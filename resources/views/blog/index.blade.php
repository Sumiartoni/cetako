@extends('layouts.app')
@section('title', 'Blog & Artikel Percetakan - Cetako')
@section('meta_description', 'Tips, inspirasi, dan berita terbaru seputar dunia percetakan, advertising, dan packaging dari Cetako.')
@section('canonical', route('blog.index'))

@push('structured_data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Blog',
    'name' => 'Blog Cetako',
    'description' => 'Tips, inspirasi, dan berita terbaru seputar dunia percetakan',
    'url' => route('blog.index'),
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Cetako',
        'logo' => ['@type' => 'ImageObject', 'url' => asset('images/logo-clean.png')]
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog']
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('styles')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<style>
    .blog-hero { padding:140px 0 60px; background:var(--white); border-bottom:1px solid var(--beige); }
    .blog-hero h1 { font-family:var(--font-display); font-size:2.5rem; font-weight:700; color:var(--navy); margin-bottom:8px; }
    .blog-hero p { color:var(--charcoal-light); font-size:1.05rem; }
    .blog-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:28px; padding:60px 0; }
    .blog-card { background:var(--white); border-radius:var(--radius-lg); overflow:hidden; border:1px solid var(--beige); transition:var(--transition); }
    .blog-card:hover { transform:translateY(-6px); box-shadow:var(--shadow-lg); }
    .blog-card-img { height:200px; background:var(--beige); display:flex; align-items:center; justify-content:center; overflow:hidden; }
    .blog-card-img img { width:100%; height:100%; object-fit:cover; }
    .blog-card-body { padding:24px; }
    .blog-card-date { font-size:0.78rem; color:var(--charcoal-light); margin-bottom:8px; display:flex; align-items:center; gap:6px; }
    .blog-card-title { font-family:var(--font-display); font-size:1.1rem; font-weight:700; color:var(--navy); margin-bottom:8px; line-height:1.4; }
    .blog-card-title:hover { color:var(--red); }
    .blog-card-excerpt { font-size:0.88rem; color:var(--charcoal-light); line-height:1.7; }
    .blog-empty { text-align:center; padding:80px 20px; color:var(--charcoal-light); }
    @media(max-width:768px) { .blog-grid { grid-template-columns:1fr; } }
</style>
@endsection

@section('content')
<div class="blog-hero">
    <div class="container">
        <h1>Blog & Artikel</h1>
        <p>Tips, inspirasi, dan berita terbaru seputar dunia percetakan</p>
    </div>
</div>
<div class="container">
    @if($articles->count())
    <div class="blog-grid">
        @foreach($articles as $article)
        <a href="{{ route('blog.show', $article->slug) }}" class="blog-card">
            <div class="blog-card-img">
                @if($article->featured_image)
                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}">
                @else
                    <i data-lucide="file-text" style="width:48px;height:48px;color:var(--charcoal-light);opacity:0.3;"></i>
                @endif
            </div>
            <div class="blog-card-body">
                <div class="blog-card-date">
                    <i data-lucide="calendar" style="width:14px;height:14px;"></i>
                    {{ $article->formatted_date }}
                </div>
                <h2 class="blog-card-title">{{ $article->title }}</h2>
                <p class="blog-card-excerpt">{{ Str::limit($article->excerpt ?? strip_tags($article->content), 120) }}</p>
            </div>
        </a>
        @endforeach
    </div>
    <div style="text-align:center;padding:0 0 60px;">{{ $articles->links() }}</div>
    @else
    <div class="blog-empty">
        <i data-lucide="book-open" style="width:48px;height:48px;opacity:0.3;margin-bottom:16px;"></i>
        <h3 style="color:var(--navy);margin-bottom:8px;">Belum Ada Artikel</h3>
        <p>Artikel dan tips seputar percetakan akan segera hadir.</p>
    </div>
    @endif
</div>
@endsection

@section('footer')
@include('partials.footer')
@endsection
