<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View
    {
        $categories = Category::select(Category::$selectedFields)->get();
        return \view('news.category',['newsList' => $categories]);
    }

    public function category(int $catId) {
        $news = News::
        join('categories_has_news as chn','news.id','=', 'chn.news_id')
            ->leftJoin('categories','chn.category_id','=','categories.id')
            ->select('news.*','categories.title as category_title','chn.category_id as category_id')
            ->where('chn.category_id','=',$catId)
            ->get();
        return \view('news.index', ['newsList' => $news]);
    }

    public function show(int $catId, int $id): View
    {
        $news = News::
        join('categories_has_news as chn','news.id','=', 'chn.news_id')
            ->leftJoin('categories','chn.category_id','=','categories.id')
            ->select('news.*','categories.title as category_title','chn.category_id as category_id')
            ->where('chn.news_id','=',$id)
            ->get()[0];
        return \view('news.show',['news' => $news]);
    }
}
