<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    /**
     * Relazione con il modello Article.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
