<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relazione con il modello Article.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
