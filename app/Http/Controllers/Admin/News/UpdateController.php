<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\UpdateRequest;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(News $news, UpdateRequest $request)
    {

        $data = $request->validated();
        $news = $this->service->update($data,$news);
        return redirect()->route('admin.news.show', $news->id);
    }
}
