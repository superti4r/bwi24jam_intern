<?php

namespace App\Http\Controllers;

use App\Enum\Status;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct(private readonly ArticleService $articleService)
    {
    }

    public function show(string $slug): View
    {
        $article = Article::with(['user', 'category'])->where('slug', $slug)->where('status', Status::PUBLISHED)->firstOrFail();

        return view('pages.home.articles.show', compact('article'));
    }

    public function search(Request $request): View
    {
        $query = trim((string) $request->query('q', ''));
        $articles = Article::with(['user', 'category'])->where('status', Status::PUBLISHED)->when($query !== '', fn($queryBuilder) => $queryBuilder->where('title', 'like', "%{$query}%"))->latest()->get();

        return view('pages.home.search-articles.index', compact('articles', 'query'));
    }

    public function index(Request $request): View
    {
        $articles = $request->user()->hasRole('administrator')
            ? Article::with(['user', 'category'])->latest()->paginate(5)
            : $request->user()->articles()->with('category')->latest()->paginate(5);

        return view('pages.app.articles.index', compact('articles'));
    }

    public function create(): View
    {
        return view('pages.app.articles.create', ['categories' => Category::orderBy('name')->get()]);
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $this->articleService->store($request->user(), $request->validated(), $request->file('thumbnail'));

        return to_route('dashboard.articles.index')->with('status', 'Artikel berhasil dibuat.');
    }

    public function edit(Article $article): View
    {
        Gate::authorize('update', $article);

        return view('pages.app.articles.edit', ['article' => $article, 'categories' => Category::orderBy('name')->get()]);
    }

    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        Gate::authorize('update', $article);
        $data = $request->validated();
        if (!$request->user()->hasRole('administrator')) {
            unset($data['status']);
        }
        $this->articleService->update($article, $data, $request->file('thumbnail'));

        return to_route('dashboard.articles.index')->with('status', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Request $request, Article $article): RedirectResponse
    {
        Gate::authorize('delete', $article);
        if ($article->thumbnail) {
            \Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();

        return to_route('dashboard.articles.index')->with('status', 'Artikel berhasil dihapus.');
    }
}
