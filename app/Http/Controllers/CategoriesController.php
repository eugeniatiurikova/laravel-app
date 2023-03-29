<?php

namespace App\Http\Controllers;

use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;

class CategoriesController extends Controller
{

    public function index(CategoriesQueryBuilder $builder): View
    {
        return view('news.category',['newsList' => $builder->getCategories()]);
    }

    public function category(CategoriesQueryBuilder $builder,int $catId) {
        $category = $builder->getCategoryById($catId);
        return \view('news.index', ['category' => $category]);
    }

}
