<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaComment extends Model
{
    protected $fillable = [
        'user_id',
        'idea_id',
        'content',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function idea(): BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }
}
