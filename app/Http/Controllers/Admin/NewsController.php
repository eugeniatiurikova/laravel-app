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
use App\Services\UploadService;
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
        return view('admin.news.index', ['newsList' => $data, 'select' => $request->select]);
    }

    public function create()
    {
        $statuses = StatusEnum::getValues();
        $categories = Category::all();
        return view('admin.news.create', ['categoryList' => $categories,'statuses' => $statuses]);
    }

    public function store(Create $request, NewsQueryBuilder $builder, array $newNews = []): RedirectResponse
    {
        if ($newNews === []) {
            $newNews = $request->validated();
            $categoryIds = $request->getCategoryIds();
        } else $categoryIds = $newNews['categories'];

        $news = $builder->create($newNews);
        if($news->save()) {
            $news->categories()->attach($categoryIds);
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

    public function update(Edit $request, News $news, UploadService $uploadService, NewsQueryBuilder $builder): RedirectResponse
    {
        $validated = $request->validated();
        if($request->hasFile('image')) {
            $validated['image'] = '/storage/' . $uploadService->uploadImage($request->file('image'),'news');
        }

         if($builder->update($news, $validated)) {
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
