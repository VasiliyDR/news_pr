<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\StoreRequest;
use App\Models\City;
use App\Models\News;

class ShowController extends Controller
{
    public function __invoke(City $city)
    {
        return view('admin.city.show', compact('city'));
    }
}
