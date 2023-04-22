<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public static $selectedFields = [
        'id',
        'title',
        'description',
        'deleted',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'id',
        'title',
        'description',
        'deleted',
    ];

    public function scopeCategories(Builder $query, array $columns = ['*']): Builder
    {
        return $query->select($columns)->orderByDesc('updated_at');
    }

    // Relations

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class,
            'categories_has_news', 'category_id','news_id');
    }
}
