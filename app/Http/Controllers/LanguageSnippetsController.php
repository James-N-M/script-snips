<?php

namespace App\Http\Controllers;

use App\Language;
use App\Snippet;
use Illuminate\Http\Request;

class LanguageSnippetsController extends Controller
{
    public function index(Language $language = null)
    {
        $snippets = Snippet::forLanguage($language)
            ->latest()
            ->paginate(2);

        $languages = Language::all();

        return view('snippets.index', compact('snippets', 'languages', 'language'));
    }
}
