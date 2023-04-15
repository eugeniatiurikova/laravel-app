<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Queries\UsersQueryBuilder;
//use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Admin\Users\Create;
use App\Http\Requests\Admin\Users\Edit;
use Illuminate\Http\RedirectResponse;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersQueryBuilder $builder): View
    {
        $page = config('pagination.admin.news');
        return view('admin.users.index', ['usersList' => $builder->getUsers($page)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request, UsersQueryBuilder $builder)
    {
        $category = $builder->create($request->validated());
        if($category->save()) {
            return redirect()->route('admin.users.index')
                ->with('success','User successfully added');
        }
        return back()->with('error','Cannot add user');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsersQueryBuilder $builder, int $id): View
    {
        return view('admin.users.edit', ['user' => $builder->getUserById($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, User $user, UsersQueryBuilder $builder): RedirectResponse
    {
        $request['is_admin'] = (bool)$request['is_admin'];
        if($request->validated()) {
            $builder->update($user, $request->all());
            return redirect()->route('admin.users.index')
                ->with('success','User successfully updated');
        }
        return back()->with('error','Cannot update user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
