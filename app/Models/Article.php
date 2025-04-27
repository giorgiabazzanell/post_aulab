<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted',
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'category' => $this->category,
        ];
    }

    /**
     * Relazione con il modello User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relazione con il modello Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relazione con il modello Tag.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
