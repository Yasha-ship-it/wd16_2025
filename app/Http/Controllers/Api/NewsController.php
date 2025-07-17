<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\News;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return response()->json([
            News::paginate(10)
        ]);
    }
}
