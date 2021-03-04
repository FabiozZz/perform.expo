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

    public function services()
    {
        return view('guest.home.services');
    }

    public function contacts()
    {
        return view('guest.home.contacts');
    }

    public function planning()
    {
        return view('guest.home.architect');
    }
}
