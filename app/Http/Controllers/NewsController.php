<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View
    {
        return \view('news.category',['newsList' => $this->getCategories()]);
    }

    public function category(int $catId) {
        return \view('news.index', ['newsList' => $this->getNews()]);
    }

    public function show(int $id): View
    {
        return \view('news.show',['news' => $this->getNews($id)]);
    }
}
