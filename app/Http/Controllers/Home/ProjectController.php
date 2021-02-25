<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function one($category,$slug)
    {

        $project = Project::with('category','image')->where(['slug'=>$slug,])->firstOrFail();
        return view('guest.home.projects.one',compact('project'));
    }
}
