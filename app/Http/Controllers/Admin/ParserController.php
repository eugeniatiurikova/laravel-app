<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser) {
        return view('admin.news.parsed', ['newsList' => $parser->parse($request['link'])]);
//        dd($parser->parse($request['link']));
    }

}
//setLink('https://www.cbs.nl/en-gb/rss-feeds/arbeid-en-inkomen')
