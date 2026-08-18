<?php

namespace App\Http\Controllers;

use App\Enum\Status;
use App\Models\Article;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home.index', [
            'latestArticle' => Article::with(['user', 'category'])->where('status', Status::PUBLISHED)->latest()->first(),
            'articles' => Article::with(['user', 'category'])->where('status', Status::PUBLISHED)->latest()->get(),
        ]);
    }
}
