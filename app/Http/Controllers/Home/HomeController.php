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
//        $data = Project::with('category','image')
//            ->where('is_published','=',1)
//            ->orderByDesc('id')->paginate(6);
        $carousel = Project::with('image')->where('carousel', '=', 1)->get();
        return view('guest.home.index', compact('carousel'));
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

    public function stages()
    {
        return view('guest.home.process');
    }

    public function private()
    {
        return view('guest.home.private');
    }
}
