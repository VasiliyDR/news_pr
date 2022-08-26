<?php

namespace App\Http\Controllers\Main\News;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(News $news)
    {
        $cities = City::all();
        $data = Carbon::parse($news->created_at);
        return view('main.news.show', compact('news', 'cities', 'data'));

    }

}
