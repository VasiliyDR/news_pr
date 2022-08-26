<?php

namespace App\Http\Controllers\Personal\Relative;

use App\Http\Controllers\Controller;
use App\Models\News;


class DeleteController extends Controller
{
    public function __invoke(News $news)
    {
        auth()->user()->relativeNews()->detach($news->id);
        return redirect()->route('personal.favorite.index');
    }
}
