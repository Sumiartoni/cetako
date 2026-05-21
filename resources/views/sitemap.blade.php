{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- Homepage --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toW3cString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Produk Index --}}
    <url>
        <loc>{{ route('produk.index') }}</loc>
        <lastmod>{{ $latestProduct ? $latestProduct->updated_at->toW3cString() : now()->toW3cString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    {{-- Blog Index --}}
    <url>
        <loc>{{ route('blog.index') }}</loc>
        <lastmod>{{ $latestArticle ? $latestArticle->updated_at->toW3cString() : now()->toW3cString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>

    {{-- Individual Products --}}
    @foreach($products as $product)
    <url>
        <loc>{{ route('produk.show', $product->slug) }}</loc>
        <lastmod>{{ $product->updated_at->toW3cString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- Individual Articles --}}
    @foreach($articles as $article)
    <url>
        <loc>{{ route('blog.show', $article->slug) }}</loc>
        <lastmod>{{ $article->updated_at->toW3cString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
