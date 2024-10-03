<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $fillable = [
        'first_name',
        'last_name',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
