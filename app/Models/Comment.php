<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    // Sesuai dengan atribut di tabel
    protected $fillable = [
        'article_id', 
        'name', 
        'content', 
        'published_at'
    ];

    public function article(): BelongsTo
    {
        // article seuai dengan model
        return $this->BelongsTo(Article::class);
    }
}
