<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    use NewsTrait;

    public function index(): View
    {
        return view('admin.categories.index', ['newsList' => $this->getCategories()]);
    }

    public function create()
    {
        return view('admin.categories.create');
//        return response()->json(['title' => 'title', 'description' => 'description']);
//        return response()->download('robots.txt');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255']
        ]);
        return response()->json($request->only(['title','description']));
//        file_put_contents()

//        dd($request->only(['title', 'description']));
//        dd($request->except(['_token']));
//        dd($request->input('title','default title'));
//        dd($request->title);
//        dd($request->isMethod('POST'));
//        dd($request->query('paramname','defaultname'));
//        dd($request->get('paramname','defaultname')); //аналог query
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id): View
    {
        return view('admin.categories.edit');
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
