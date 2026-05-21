<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\ProductController;

// Landing Page
Route::get('/', function () {
    return view('landing');
});

// Static Pages
Route::get('/tentang', function () {
    return view('pages.tentang');
})->name('tentang');

Route::get('/layanan', function () {
    return view('pages.layanan');
})->name('layanan');

Route::get('/portofolio', function () {
    return view('pages.portofolio');
})->name('portofolio');

Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

// SEO: Sitemap
Route::get('/sitemap.xml', function () {
    $articles = \App\Models\Article::published()->latest('published_at')->get();
    $products = \App\Models\Product::active()->latest()->get();
    $latestArticle = $articles->first();
    $latestProduct = $products->first();

    return response()
        ->view('sitemap', compact('articles', 'products', 'latestArticle', 'latestProduct'))
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

// Blog public routes
Route::get('/blog', function () {
    $articles = \App\Models\Article::published()->latest('published_at')->paginate(9);
    return view('blog.index', compact('articles'));
})->name('blog.index');

Route::get('/blog/{slug}', function ($slug) {
    $article = \App\Models\Article::where('slug', $slug)->published()->firstOrFail();
    $relatedArticles = \App\Models\Article::published()
        ->where('id', '!=', $article->id)->latest()->take(3)->get();
    return view('blog.show', compact('article', 'relatedArticles'));
})->name('blog.show');

// Produk public routes
Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');

// Admin Auth
Route::get('/admin/login', [DashboardController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [DashboardController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');

// Admin Dashboard (protected)
Route::prefix('admin')->name('admin.')->middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('articles', ArticleController::class)->except(['show']);
    Route::resource('products', AdminProductController::class)->except(['show']);
    Route::resource('testimonials', TestimonialController::class)->except(['show']);
    Route::resource('faqs', FaqController::class)->except(['show']);
    Route::resource('stats', StatController::class)->except(['show']);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Page management
    Route::get('/pages/tentang', [PageController::class, 'tentang'])->name('pages.tentang');
    Route::post('/pages/tentang', [PageController::class, 'updateTentang'])->name('pages.tentang.update');
    Route::get('/pages/layanan', [PageController::class, 'layanan'])->name('pages.layanan');
    Route::post('/pages/layanan', [PageController::class, 'updateLayanan'])->name('pages.layanan.update');
});
