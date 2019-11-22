<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    protected $guarded = [];

    public function forks()
    {
        return $this->hasMany(Snippet::class, 'forked_id');
    }

    public function originalSnippet()
    {
        return $this->belongsTo(Snippet::class, 'forked_id');
    }

    public function isAFork()
    {
        return !! $this->originalSnippet;
    }

}
