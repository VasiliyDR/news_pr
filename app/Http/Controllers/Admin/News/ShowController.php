<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;

class ShowController extends BaseController
{
    public function __invoke(News $news)
    {
        $cities = City::all();
        return view('admin.news.show', compact('news', 'cities'));
    }
}
