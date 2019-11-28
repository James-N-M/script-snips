<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function snippet()
    {
        return $this->belongsTo(Snippet::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
