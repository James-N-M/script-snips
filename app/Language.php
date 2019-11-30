<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    // Uses name of model to find Language when using ** Route Model Binding **
    public function getRouteKeyName()
    {
        return 'name';
    }

    // check if this language is favorited by a user
    public function isFavorited()
    {
        return !! auth()->user()->languages()->where('language_id', $this->id)->count();
    }
}
