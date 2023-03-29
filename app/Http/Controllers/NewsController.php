<?php

namespace App\Http\Controllers;

use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $builder): View
    {
        return \view('news.all',['newsList' => $builder->getNews()]);
    }

    public function show(NewsQueryBuilder $builder, int $catId, int $id): View
    {
        return \view('news.show',['news' => $builder->getNewsById($id)]);
    }
}
