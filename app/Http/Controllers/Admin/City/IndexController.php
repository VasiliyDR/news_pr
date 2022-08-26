<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City;


class IndexController extends Controller
{
    public function __invoke()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }
}
