<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('image')->paginate(6);
        return view('guest.home.posts.index',compact('posts'));
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->all();
        $post =  Post::create($data);

        dd($post);
    }
}
