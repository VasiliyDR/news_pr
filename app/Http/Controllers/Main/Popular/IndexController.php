<?php

namespace App\Http\Controllers\Main\Popular;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;

class IndexController extends Controller
{
    public function __invoke()
    {
        $popularNews = News::withCount('popularNews')->get();
        $cities = City::all();
        return view('main.popular.index', compact('popularNews', 'cities'));

    }

}
