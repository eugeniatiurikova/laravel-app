<?php

namespace App\Http\Controllers;

use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $builder): View
    {
        $page = config('pagination.client.news');
        return \view('news.all',['newsList' => $builder->getVisibleNews($page)]);
    }

    public function show(NewsQueryBuilder $builder, int $catId, int $id): View
    {
        return \view('news.show',['news' => $builder->getNewsById($id)]);
    }
}
