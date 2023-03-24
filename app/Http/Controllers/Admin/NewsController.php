<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View
    {
        $news = app(News::class);
//        dd($news->getNews());
        return view('admin.news.index', ['newsList' => $news->getNews()]);
    }

    public function create()
    {
        $categories = app(Category::class);
        return view('admin.news.create', ['categoryList' => $categories->getCategories()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'author' => ['required', 'string', 'min:5'],
            'category' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string', 'min:10']
        ]);
        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'image' => $request->image,
            'description' => $request->description,
            'created_at' => now()->timezone('Europe/Moscow'),
            'updated_at' => now()->timezone('Europe/Moscow')
        ];
        DB::table('news')->insert($data);
        return response()->json($request->only(['title','author','category','description']));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        return view('admin.news.edit');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
