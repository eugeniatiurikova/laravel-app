<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Create;
use App\Http\Requests\Admin\Categories\Edit;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{

    public function index(CategoriesQueryBuilder $builder): View
    {
        return view('admin.categories.index', ['categoriesList' => $builder->getCategories()]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Create $request, CategoriesQueryBuilder $builder)
    {
        $category = $builder->create($request->validated());
        if($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success','News successfully added');
        }
        return back()->with('error','Cannot add news');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(CategoriesQueryBuilder $builder, int $id): View
    {
        return view('admin.categories.edit', ['category' => $builder->getCategoryById($id)]);
    }

    public function update(Edit $request, Category $category, CategoriesQueryBuilder $builder): RedirectResponse
    {
        if($builder->update($category, $request->validated())) {
            return redirect()->route('admin.categories.index')
                ->with('success','Category successfully category');
        }
        return back()->with('error','Cannot update category');
    }

    public function destroy(string $id)
    {
        //
    }
}
