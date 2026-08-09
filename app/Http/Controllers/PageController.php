<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('m.home');
        }

        return view('pages.app.home');
    }

    public function member()
    {
        return view('pages.app.home');
    }
}
