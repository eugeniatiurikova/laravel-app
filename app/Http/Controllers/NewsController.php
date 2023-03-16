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

    public function show(int $id) {
        $news = $this->getNews($id);
        return view('news.show', [
            'news' => $news
        ]);
    }
}
