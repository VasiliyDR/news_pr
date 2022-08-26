<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\News;
use App\Models\User;


class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();


        $cities = City::all();
        $news = News::all();
        return view('admin.main.index', compact('users', 'cities', 'news'));
    }
}
