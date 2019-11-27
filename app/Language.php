<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    // so the slug grabs the language in snippets
    public function getRouteKeyName()
    {
        return 'name';
    }
}
