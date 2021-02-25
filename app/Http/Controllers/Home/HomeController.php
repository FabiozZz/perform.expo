<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Project::with('category','image')
            ->where('is_published','=',1)
            ->orderByDesc('id')->limit(6)->get();
        $carousel = Project::with('image')->where('carousel', '=', 1)->get();
        return view('guest.home.index', compact('data','carousel'));
    }
}
