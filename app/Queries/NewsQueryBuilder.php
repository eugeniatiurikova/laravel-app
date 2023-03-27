<?php
namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class NewsQueryBuilder
{
    private Builder $model;

    public function __construct() {
        $this->model = News::query();
    }

    public function getNews(): Collection|LengthAwarePaginator
    {
        return $this->model
            ->news()
            ->with('categories')
            ->paginate(config('pagination.admin.news'));
    }

    public function getNewsById(int $id)
    {
        return $this->model
            ->newsById($id)
            ->with('categories')
            ->get()[0];
    }

    public function create(array $data): News|bool
    {
        return News::create($data);
    }

    public function update(News $news, array $data): bool
    {
        return $news->fill($data)->save();
    }
}
