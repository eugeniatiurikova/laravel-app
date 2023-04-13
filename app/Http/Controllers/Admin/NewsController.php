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
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class NewsController extends Controller
{

    public function index(NewsQueryBuilder $builder, Request $request): View
    {
//        dd($request->asd);
        $page = config('pagination.admin.news');
        switch ($request->select) {
            case 'published':
                $data = $builder->getPublishedNews($page);
                break;
            case 'visible':
                $data = $builder->getVisibleNews($page);
                break;
            case 'disabled':
                $data = $builder->getDisabledNews();
                break;
                default:
                $data = $builder->getNews($page);
        }
        return view('admin.news.index', ['newsList' => $data]);
    }

    public function create()
    {
        //        dd($request->all());
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
//            ->with('success',__('News successfully added'));

        }
        return back()->with('error','Cannot add news');
    }

    public function edit(News $news): View
    {
        $statuses = StatusEnum::getValues();
        $categories = Category::all();
        return view('admin.news.edit', ['news' => $news, 'categoryList' => $categories, 'statuses' => $statuses]);
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

    public function destroy(News $news): JsonResponse
    {
        try {
            $news->delete();
            return response()->json('ok');
        } catch (Exception $excception) {
            \Log::error($excception->getMessage(), $excception->getTrace());
            return response()->json('error', 400);
        }
    }
}
