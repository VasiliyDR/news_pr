<?php

namespace App\Http\Controllers\Main\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;

class IndexController extends Controller
{
    public function __invoke(City $city)
    {

        $news = $city->news;
        $cities = City::all();
        $newsOtherCity = News::where('city_id', '!=', $city->id)->get();
        return view('main.city.index', compact( 'news', 'cities', 'city', 'newsOtherCity'));

    }

}
