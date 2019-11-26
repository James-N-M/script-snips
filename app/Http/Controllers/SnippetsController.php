<?php

namespace App\Http\Controllers;

use App\Language;
use App\Snippet;

class SnippetsController extends Controller
{
    public function index()
    {
        $snippets = Snippet::all();

        $languages = Language::all();

        return view('snippets.index', compact('snippets', 'languages'));
    }

    public function create(Snippet $snippet)
    {
        $this->authorize('create', Snippet::class);

        $languages = Language::all();

        return view('snippets.create', compact('snippet', 'languages'));
    }

    public function show(Snippet $snippet)
    {
        return view('snippets.show', compact('snippet'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        Snippet::create([
            'title' => request('title'),
            'body' => request('body'),
            'forked_id' => request('forked_id'),
            'user_id' => auth()->id(),
            'language_id' => request('language_id')
        ]);

        return redirect('/');
    }
}
