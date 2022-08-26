<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Service\NewsService;

class BaseController extends Controller
{
    public $service;

    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }
}
