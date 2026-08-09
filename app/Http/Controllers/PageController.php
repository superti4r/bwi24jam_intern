<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('m.home');
        }

        return $this->renderHome();
    }

    public function member()
    {
        return $this->renderHome();
    }

    protected function renderHome()
    {
        $latest = Article::query()
            ->published()
            ->with(['user', 'category'])
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $articles = Article::query()
            ->published()
            ->with(['user', 'category'])
            ->whereNotIn('id', $latest->pluck('id'))
            ->orderBy('created_at', 'desc')
            ->paginate(8)
            ->withQueryString();

        return view('pages.app.home', compact('latest', 'articles'));
    }
}
