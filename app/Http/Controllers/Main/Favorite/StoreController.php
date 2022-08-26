<?php

namespace App\Http\Controllers\Main\Favorite;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;

class StoreController extends Controller
{
    public function __invoke(News $news)
    {
        auth()->user()->relativeNews()->toggle($news->id);
        return redirect()->back();

    }

}
