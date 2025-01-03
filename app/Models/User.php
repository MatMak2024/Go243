<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends \TCG\Voyager\Models\User
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(): HasMany {
        return $this->hasMany('Post::class');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }


    public function mentor(): HasOne
    {
        return $this->hasOne(Mentor::class);
    }


    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class, 'mentee_id');
    }


    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class);
    }


    public function ideacomments(): HasMany
    {
        return $this->hasMany(IdeaComment::class);
    }
}