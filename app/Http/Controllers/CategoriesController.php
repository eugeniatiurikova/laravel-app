<?php

namespace App\Http\Controllers;

use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;

class CategoriesController extends Controller
{

    public function index(CategoriesQueryBuilder $builder): View
    {
        $page = config('pagination.client.categories');
        return view('news.category',['newsList' => $builder->getCategories($page)]);
    }

    public function category(CategoriesQueryBuilder $builder,int $catId)
    {
        return \view('news.index', ['category' => $builder->getCategoryById($catId)]);
    }

}
