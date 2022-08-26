<?php

namespace App\Http\Controllers\Main\Favorite;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;

class IndexController extends Controller
{
    public function __invoke()
    {

        $relatedNewsForUser = null;
        $relatedNews = null;
        if(auth()->user() != null) {
            $relatedNewsForUser = auth()->user()->relativeNews;
        } else {
            $relatedNews = News::where('isRelated', '=', true)->get();
        }

        $cities = City::all();
        return view('main.favorit.index', compact('relatedNewsForUser', 'cities', 'relatedNews'));

    }

}
