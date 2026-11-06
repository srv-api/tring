<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Query artikel yang sudah dipublikasikan.
     */
    private function publishedArticles()
    {
        return Article::with(['category', 'user'])
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Daftar artikel blog.
     */
    public function index(Request $request)
    {
        $activeCategory = $request->query('category', 'Semua');

        $query = $this->publishedArticles();

        // Filter berdasarkan kategori
        if ($activeCategory !== 'Semua') {
            $query->whereHas('category', function ($q) use ($activeCategory) {
                $q->where('slug', $activeCategory);
            });
        }

        // Daftar artikel
        $articles = $query
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        // Kategori yang mempunyai artikel publik
        $categories = Category::whereHas('articles', function ($q) {
                $q->where('status', 'published')
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
            })
            ->orderBy('name')
            ->get();

        return view('blog.index', compact(
            'articles',
            'categories',
            'activeCategory'
        ));
    }

    /**
     * Detail artikel.
     */
    public function show(string $slug)
    {
        $article = $this->publishedArticles()
            ->where('slug', $slug)
            ->firstOrFail();

        // Artikel terkait
        $related = $this->publishedArticles()
            ->where('id', '!=', $article->id)
            ->when($article->category_id, function ($query) use ($article) {
                $query->where('category_id', $article->category_id);
            })
            ->latest('published_at')
            ->limit(3)
            ->get();

        // Jika tidak ada artikel dalam kategori yang sama
        if ($related->isEmpty()) {
            $related = $this->publishedArticles()
                ->where('id', '!=', $article->id)
                ->latest('published_at')
                ->limit(3)
                ->get();
        }

        return view('blog.show', compact(
            'article',
            'related'
        ));
    }
}
