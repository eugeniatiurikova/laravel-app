<?php

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class CategoriesQueryBuilder
{
    private Builder $model;

    public function __construct() {
        $this->model = Category::query();
    }

    public function getCategories(int $page): Collection|LengthAwarePaginator
    {
        return $this->model
            ->categories()
            ->with('news')
            ->paginate($page);
    }

    public function getCategoryById(int $id)
    {
        return $this->model
            ->categoryById($id)
            ->with('news')
            ->where('id','=',$id)
            ->get()[0];
    }

    public function create(array $data): Category|bool
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->fill($data)->save();
    }
}
