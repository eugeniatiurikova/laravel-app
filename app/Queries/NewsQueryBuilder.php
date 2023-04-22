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

    public function getNews(int $page): Collection|LengthAwarePaginator
    {
        return $this->model
            ->news()
            ->with('categories')
            ->paginate($page);
    }

    public function getLastNews(int $count = 5): Collection|LengthAwarePaginator
    {
        return $this->model
            ->news()
            ->with('categories')
            ->orderByDesc('updated_at')
            ->limit($count)
            ->get();
    }

    public function getPublishedNews(int $page): Collection|LengthAwarePaginator
    {
        return $this->model
            ->publishedNews()
            ->with('categories')
            ->paginate($page);
    }

    public function getVisibleNews(int $page): Collection|LengthAwarePaginator
    {
        return $this->model
            ->visibleNews()
            ->with('categories')
            ->paginate($page);
    }

    public function getDisabledNews(): Collection|LengthAwarePaginator
    {
        return $this->model
            ->disabledNews()
            ->with('categories')
            ->paginate(config('pagination.admin.news'));
    }

    public function getNewsById(int $id)
    {
        return $this->model
            ->news()
            ->with('categories')
            ->where('id','=',$id)
            ->get()
            ->first();
    }

    public function getNewsByTitle(string $title)
    {
        return $this->model
            ->news()
            ->with('categories')
            ->where('title','=',$title)
            ->get()
            ->first();
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
