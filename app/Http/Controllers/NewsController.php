<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $newsList = $this->getNews();
        return view('news.index', [
            'newsList' => $newsList
        ]);
    }

    public function category(int $catId) {
        $newsList = $this->getNews($catId);
        return view('news.category', [
            'newsList' => $newsList
        ]);
    }

    public function show(int $id) {
        $news = $this->getNews(1, $id);
        return view('news.show', [
            'news' => $news
        ]);
    }
}
