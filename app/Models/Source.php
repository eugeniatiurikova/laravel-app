<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    protected $fillable = [
        'id',
        'name',
        'email',
        'url',
        'description',
    ];

    public function scopeSources(Builder $query, array $columns = ['*']): Builder {
        return $query->select($columns)->orderByDesc('updated_at');
    }

    public function scopeSourceById(Builder $query, int $id, array $columns = ['*']): ?Builder
    {
        return $query->select($columns)->where('id','=',$id);
    }
}
