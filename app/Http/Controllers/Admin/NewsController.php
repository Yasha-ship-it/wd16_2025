<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\News\NewsService;

class NewsController extends Controller
{


    public function index(NewsService $newsService)
    {
        return $newsService->getNews();
    }
}
