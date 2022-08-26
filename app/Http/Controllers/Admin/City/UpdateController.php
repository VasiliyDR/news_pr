<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\UpdateRequest;
use App\Models\City;

class UpdateController extends Controller
{
    public function __invoke(City $city, UpdateRequest $request)
    {
        $data = $request->validated();
        $city->update($data);
        return redirect()->route('admin.city.show', $city->id);
    }
}
