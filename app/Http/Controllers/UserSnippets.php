<?php

namespace App\Http\Controllers;

use App\Snippet;

class UserSnippets extends Controller
{
    public function index()
    {
        $snippets = Snippet::all()
            ->where('user_id', auth()->id());

        return view('user_snippets.index', compact('snippets'));
    }
}
