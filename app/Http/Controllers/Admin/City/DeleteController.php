<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\StoreRequest;
use App\Models\City;

class DeleteController extends Controller
{
    public function __invoke(City $city)
    {
        $city->delete();
        return redirect()->route('admin.cities.index');
    }
}
