<?php

namespace App\Http\Controllers;

use App\Language;

class LanguageFavoritesController extends Controller
{
    public function store(Language $language)
    {
        auth()->user()->languages()->attach($language->id);
        return redirect()->back();
    }
}
