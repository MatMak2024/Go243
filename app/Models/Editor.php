<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Editor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'bio',
        'image',
        'user_id',
        'password'

    ];

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
