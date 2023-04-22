<?php

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

final class UsersQueryBuilder
{
    private Builder $model;

    public function __construct() {
        $this->model = User::query();
    }

    public function getUsers(int $page): Collection|LengthAwarePaginator
    {
        return $this->model
            ->users()
            ->paginate($page);
    }

    public function getUserById(int $id)
    {
        return $this->model
            ->userById($id)
            ->where('id','=',$id)
            ->get()
            ->first();
    }

    public function create(array $data): User|bool
    {
        return User::create($data);
    }

    public function update(User $user, array $data): bool
    {
        return $user->fill(
            array_merge($data, ['password' => Hash::make($data['password'])])
        )->save();
    }
}
