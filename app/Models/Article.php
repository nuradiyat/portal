<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    // Sesuai dengan atribut di tabel
    // protected $fillable = ['name', 'content', 'categori_id', 'user_id', 'date_of_birth'];
     // Sesuai dengan atribut di tabel
     protected $fillable = [
        'name',
        'content',
        'categori_id',
        'user_id',
        'image',
        'published_at',
    ];

    // Relasi: Artikel memiliki satu kategori
    public function categori(): BelongsTo
    {
        // article seuai dengan model
        return $this->belongsTo(Categori::class);
    }

    public function user(): BelongsTo
    {
        // article seuai dengan model
        return $this->belongsTo(User::class);
    }

    // Relasi: Artikel memiliki banyak komentar
    public function comment(): HasMany
    {
        // article seuai dengan model
        return $this->hasMany(Comment::class);
    }
}