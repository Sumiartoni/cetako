@extends('layouts.app')
@section('title', ($article->meta_title ?? $article->title) . ' - Cetako Blog')
@section('meta_description', $article->meta_description ?? Str::limit(strip_tags($article->excerpt ?? $article->content), 155))
@section('og_type', 'article')
@section('meta_image', $article->featured_image ? asset('storage/' . $article->featured_image) : asset('images/logo-clean.png'))
@section('canonical', route('blog.show', $article->slug))

@push('structured_data')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $article->meta_title ?? $article->title,
    'description' => $article->meta_description ?? Str::limit(strip_tags($article->excerpt ?? $article->content), 155),
    'image' => $article->featured_image ? asset('storage/' . $article->featured_image) : asset('images/logo-clean.png'),
    'datePublished' => $article->published_at ? $article->published_at->toIso8601String() : $article->created_at->toIso8601String(),
    'dateModified' => $article->updated_at->toIso8601String(),
    'author' => ['@type' => 'Organization', 'name' => 'Cetako'],
    'publisher' => ['@type' => 'Organization', 'name' => 'Cetako', 'logo' => ['@type' => 'ImageObject', 'url' => asset('images/logo-clean.png')]],
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => route('blog.show', $article->slug)],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $article->title],
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('styles')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<style>
    .article-hero { padding:140px 0 40px; background:var(--white); border-bottom:1px solid var(--beige); }
    .article-meta { display:flex; align-items:center; gap:16px; margin-bottom:16px; font-size:0.85rem; color:var(--charcoal-light); }
    .article-title { font-family:var(--font-display); font-size:2.4rem; font-weight:700; color:var(--navy); line-height:1.3; max-width:800px; }
    .article-content-wrapper { max-width:800px; margin:0 auto; padding:48px 0 80px; }
    .article-featured-img { margin:-20px 0 40px; border-radius:var(--radius-xl); overflow:hidden; }
    .article-featured-img img { width:100%; }
    .article-body { font-size:1.05rem; line-height:1.9; color:#374151; }
    .article-body h2 { font-family:var(--font-display); font-size:1.6rem; font-weight:700; color:var(--navy); margin:40px 0 16px; }
    .article-body h3 { font-size:1.2rem; font-weight:700; color:var(--navy); margin:32px 0 12px; }
    .article-body p { margin-bottom:20px; }
    .article-body ul, .article-body ol { margin-bottom:20px; padding-left:24px; }
    .article-body li { margin-bottom:8px; }
    .article-body img { border-radius:var(--radius-md); margin:24px 0; max-width:100%; }
    .article-body blockquote { border-left:4px solid var(--red); padding:16px 24px; background:var(--cream); border-radius:0 var(--radius-md) var(--radius-md) 0; margin:24px 0; font-style:italic; }
    .related-section { background:var(--cream); padding:60px 0; border-top:1px solid var(--beige); }
    .related-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; margin-top:32px; }
    .related-card { background:var(--white); border-radius:var(--radius-md); padding:24px; border:1px solid var(--beige); transition:var(--transition); }
    .related-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-md); }
    .related-card-title { font-family:var(--font-display); font-weight:700; color:var(--navy); margin-bottom:8px; }
    .related-card-date { font-size:0.78rem; color:var(--charcoal-light); }
    @media(max-width:768px) { .article-title { font-size:1.7rem; } .related-grid { grid-template-columns:1fr; } }
</style>
@endsection

@section('content')
<div class="article-hero">
    <div class="container">
        <div class="article-meta">
            <span><i data-lucide="calendar" style="width:14px;height:14px;"></i> {{ $article->formatted_date }}</span>
            <a href="{{ route('blog.index') }}" style="color:var(--red);font-weight:600;">← Kembali ke Blog</a>
        </div>
        <h1 class="article-title">{{ $article->title }}</h1>
    </div>
</div>
<div class="container">
    <div class="article-content-wrapper">
        @if($article->featured_image)
        <div class="article-featured-img">
            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}">
        </div>
        @endif
        <div class="article-body">{!! $article->content !!}</div>
    </div>
</div>

@if($relatedArticles->count())
<div class="related-section">
    <div class="container">
        <h2 style="font-family:var(--font-display);color:var(--navy);font-size:1.5rem;font-weight:700;">Artikel Lainnya</h2>
        <div class="related-grid">
            @foreach($relatedArticles as $related)
            <a href="{{ route('blog.show', $related->slug) }}" class="related-card">
                <div class="related-card-date">{{ $related->formatted_date }}</div>
                <h3 class="related-card-title">{{ $related->title }}</h3>
                <p style="font-size:0.85rem;color:var(--charcoal-light);">{{ Str::limit($related->excerpt ?? strip_tags($related->content), 100) }}</p>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection

@section('footer')
@include('partials.footer')
@endsection
