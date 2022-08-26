<?php

namespace App\Http\Controllers\Personal\Relative;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke()
    {
        $news = auth()->user()->relativeNews;
        return view('personal.favorite.index', compact('news'));
    }
}
