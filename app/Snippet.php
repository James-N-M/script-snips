<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    use Likeability;

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

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

}
