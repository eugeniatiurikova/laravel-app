<?php

namespace App\Models;

use App\Enums\News\StatusEnum;
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
        'isVisible',
        'image',
        'description',
    ];

//    protected $casts = [
//        'is_admin' => 'bool'
//    ];


    public function scopeNews(Builder $query, array $columns = ['*']): Builder {
        return $query->select($columns)->orderByDesc('updated_at');
    }

    public function scopeDisabledNews(Builder $query, array $columns = ['*']): Builder {
        return $query->select($columns)
            ->where('isVisible','=',0)
            ->orWhere('status','=',StatusEnum::DRAFT)
            ->orWhere('status','=',StatusEnum::BLOCKED)
            ->orWhere('status','=',StatusEnum::DELETED)
            ->orderByDesc('updated_at');
    }

    public function scopeVisibleNews(Builder $query, array $columns = ['*']): Builder {
        return $query->select($columns)
            ->where('isVisible','=',1)
            ->orWhere('status','=',StatusEnum::PUBLISHED)
            ->orderByDesc('updated_at');
    }

    public function scopePublishedNews(Builder $query, array $columns = ['*']): Builder {
        return $query->select($columns)->where('status','=',StatusEnum::PUBLISHED)->orderByDesc('updated_at');
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
