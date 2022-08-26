<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\City;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $cities = City::all();
        return view('admin.news.create', compact('cities'));
    }
}
