<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\StoreRequest;
use App\Models\City;
use App\Models\News;

class DeleteController extends BaseController
{
    public function __invoke(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
