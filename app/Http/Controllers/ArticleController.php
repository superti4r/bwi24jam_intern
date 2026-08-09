<?php

namespace App\Http\Controllers;

use App\Enum\Role;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleController extends Controller
{
    public function __construct(
        private readonly ArticleService $articleService,
    ) {}

    public function index(): View
    {
        $articles = Article::query()
            ->with(['user', 'category'])
            ->when(! auth()->user()->hasRole(Role::ADMINISTRATOR), function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('pages.articles.index', compact('articles'));
    }

    public function create(): View
    {
        $categories = Category::query()->orderBy('name')->get();

        return view('pages.articles.create', compact('categories'));
    }

    public function show(string $slug, string $title): View
    {
        $article = Article::query()
            ->published()
            ->with(['user', 'category'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.app.articles', compact('article'));
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $this->articleService->create($request->validated(), auth()->id());

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(string $id): View
    {
        $article = Article::with(['user', 'category'])->findOrFail($id);

        abort_unless($this->guard($article), 403);

        $categories = Category::query()->orderBy('name')->get();

        return view('pages.articles.edit', compact('article', 'categories'));
    }

    public function update(UpdateArticleRequest $request, string $id): RedirectResponse
    {
        $article = Article::findOrFail($id);

        abort_unless($this->guard($article), 403);

        $this->articleService->update($article, $request->validated());

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $article = Article::findOrFail($id);

        abort_unless($this->guard($article), 403);

        $this->articleService->delete($article);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    public function thumbnail(Request $request): JsonResponse
    {
        $request->validate([
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:10240'],
        ]);

        $file = $request->file('thumbnail');

        if (! $file instanceof UploadedFile) {
            return response()->json(['error' => 'File tidak valid.'], 422);
        }

        $path = $this->articleService->uploadThumbnail($file);

        return response()->json(['thumbnail' => $path]);
    }

    public function remove(Request $request): JsonResponse
    {
        $request->validate([
            'path' => ['required', 'string'],
        ]);

        $this->articleService->removeThumbnail($request->input('path'));

        return response()->json(['success' => true]);
    }

    public function search(Request $request): JsonResponse
    {
        $q = $request->input('q', '');

        if (mb_strlen(trim($q)) < 2) {
            return response()->json(['results' => []]);
        }

        $results = Article::query()
            ->published()
            ->with(['category'])
            ->where('title', 'like', '%' . $q . '%')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get()
            ->map(function (Article $article) {
                return [
                    'id' => $article->id,
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'category' => $article->category?->name,
                    'thumbnail' => $article->thumbnail,
                    'url' => route(auth()->check() ? 'm.articles.show' : 'articles.show', [
                        $article->slug,
                        \Illuminate\Support\Str::slug($article->title),
                    ]),
                ];
            });

        return response()->json(['results' => $results]);
    }

    protected function guard(Article $article): bool
    {
        return auth()->user()->hasRole(Role::ADMINISTRATOR)
            || $article->user_id === auth()->id();
    }
}
