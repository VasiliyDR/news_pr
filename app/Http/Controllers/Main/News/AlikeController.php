<?php

namespace App\Http\Controllers\Main\News;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;

class AlikeController extends Controller
{
    public function __invoke(News $news)
    {
        $alikeNews = News::where('type_id', '=', $news->type_id)
            ->where('id', '!=', $news->id)
            ->get();
        $cities = City::all();
        return view('main.news.alike', compact('alikeNews', 'cities', 'news'));
    }

}
