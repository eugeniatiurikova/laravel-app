<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Services\Contract\Parser;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParseController extends Controller
{
    private Parser $parser;

    public function __construct() {
        $this->parser = new ParserService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('admin.news.parsed', ['newsList' => $this->parser->parse($request['link']),'link' => $request['link']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request['link']) {
            dispatch(new JobNewsParsing($request['link']));
            return back()->with('success','News successfully saved');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CategoriesQueryBuilder $builder, NewsQueryBuilder $newsBuilder)
    {
        if ($request['link']) {
            try {
                if($this->parser->writeToDatabase($request['link'], $builder, $newsBuilder)) {
                    return redirect()->route('admin.news.index')
                        ->with('success','News successfully added');
                }
            } catch (\Exception $e) {
                return redirect()->route('admin.news.index')
                    ->with('error',$e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
