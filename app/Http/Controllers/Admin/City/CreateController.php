<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.cities.create');
    }
}
