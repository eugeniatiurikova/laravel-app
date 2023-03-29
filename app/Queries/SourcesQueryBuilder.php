<?php

namespace App\Queries;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SourcesQueryBuilder
{
    public function __construct() {
        $this->model = Source::query();
    }

    public function getSources(): Collection|LengthAwarePaginator
    {
        return $this->model
            ->sources()
            ->paginate(config('pagination.admin.sources'));
    }

    public function getSourceById(int $id)
    {
        return $this->model
            ->sourceById($id)
            ->get()[0];
    }

    public function create(array $data): Source|bool
    {
        return Source::create($data);
    }

    public function update(Source $sources, array $data): bool
    {
        return $sources->fill($data)->save();
    }
}
