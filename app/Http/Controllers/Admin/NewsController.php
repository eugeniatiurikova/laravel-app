<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(NewsQueryBuilder $builder): View
    {
        return view('admin.news.index', ['newsList' => $builder->getNews()]);
    }

    public function create()
    {
        $statuses = StatusEnum::getValues();
        $categories = Category::all();
        return view('admin.news.create', ['categoryList' => $categories,'statuses' => $statuses]);
    }

    public function store(Create $request, NewsQueryBuilder $builder): RedirectResponse
    {
        $news = $builder->create($request->validated());
        if($news->save()) {
            $news->categories()->attach($request->getCategoryIds());
            return redirect()->route('admin.news.index')
                ->with('success','News successfully added');
        }
        return back()->with('error','Cannot add news');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(NewsQueryBuilder $builder, int $id): View
    {
        $statuses = StatusEnum::getValues();
        $categories = Category::all();
        return view('admin.news.edit', ['news' => $builder->getNewsById($id), 'categoryList' => $categories, 'statuses' => $statuses]);
    }

    public function update(Edit $request, News $news, NewsQueryBuilder $builder): RedirectResponse
    {
        if($builder->update($news, $request->validated())) {
            $news->categories()->sync($request->getCategoryIds());
            return redirect()->route('admin.news.index')
                ->with('success','News successfully updated');
        }
        return back()->with('error','Cannot update news');
    }

    public function destroy(string $id)
    {
        //
    }
}
