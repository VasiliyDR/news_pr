<?php

namespace App\Http\Controllers\Main\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\FilterRequest;
use App\Models\City;
use App\Models\News;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();
        if(isset($data['content'])) {
            $news = News::where('content','like', "%{$data['content']}%")->get();
            
        } else {
            $news = News::paginate(6);
        }

        $cities = City::all();
        return view('main.news.index', compact('news', 'cities'));

    }

}
