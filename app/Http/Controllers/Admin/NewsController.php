<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View
    {
        return view('admin.news.index', ['newsList' => $this->getNews()]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'author' => ['required', 'string', 'min:5'],
            'category' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string', 'min:10']
        ]);
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
