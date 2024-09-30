<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'author_id'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function ($post) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
        });
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
