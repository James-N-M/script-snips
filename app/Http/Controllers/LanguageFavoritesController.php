<?php

namespace App\Http\Controllers;

use App\Language;
use App\Like;

class LanguageFavoritesController extends Controller
{
    public function store(Language $language)
    {
        $this->authorize('create', Like::class);

        if($language->isFavorited()) {
            auth()->user()->languages()->detach($language->id);
        } else {
            auth()->user()->languages()->attach($language->id);
        }

        return redirect()->back();
    }
}
