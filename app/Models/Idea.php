<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{

    protected $fillable = [
        'title',
        'description',
        'category',
        'statuts',
        'user_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ideacomments(): HasMany
    {
        return $this->hasMany(IdeaComment::class);
    }
}
