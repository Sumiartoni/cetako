<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.form', ['article' => new Article()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:500',
            'meta_title' => 'nullable|max:70',
            'meta_description' => 'nullable|max:160',
            'meta_keywords' => 'nullable|max:255',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Ensure unique slug
        $count = Article::where('slug', $validated['slug'])->count();
        if ($count > 0) {
            $validated['slug'] .= '-' . ($count + 1);
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('articles', 'public');
        }

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dibuat!');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:500',
            'meta_title' => 'nullable|max:70',
            'meta_description' => 'nullable|max:160',
            'meta_keywords' => 'nullable|max:255',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('articles', 'public');
        }

        if ($validated['status'] === 'published' && !$article->published_at) {
            $validated['published_at'] = now();
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}
