<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NewsQueryBuilder $builder, Request $request)
    {
        $data = $builder->getLastNews(6);
        return view('admin.index', ['newsList' => $data]);
    }
}
