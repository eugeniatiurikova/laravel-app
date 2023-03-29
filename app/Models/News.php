<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'id',
        'title',
        'author',
        'status',
        'image',
        'description',
    ];

//    protected $casts = [
//        'is_admin' => 'bool'
//    ];


    public function scopeNews(Builder $query, array $columns = ['*']): Builder {
        return $query->select($columns)->orderByDesc('updated_at');
    }

    public function scopeNewsById(Builder $query, int $id, array $columns = ['*']): ?Builder
    {
        return $query->select($columns)->where('id','=',$id);
    }

    // Relations

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,
            'categories_has_news', 'news_id','category_id');
    }

}
