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
}
