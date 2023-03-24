<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function getCategories(array $columns = ['*']): Collection
    {
        return DB::table($this->table)
            ->get($columns);
    }

    public function getCategoryById(int $id, array $columns = ['*']): ?Builder
    {
        return DB::table($this->table)->find($id,$columns);
    }
}
