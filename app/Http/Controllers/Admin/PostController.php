<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('image')->orderBy('id','desc')->paginate(20);
        return view('admin.posts.index',compact('posts'));
    }
    public function one($id)
    {
        $post = Post::with('image')->findOrFail($id);
        return view('admin.posts.one',compact('post'));
    }

    public function edit($id)
    {
//        $project = Project::with('category')->findOrFail($id);
        $post = Post::with('image')->findOrFail($id);
        return view('admin.posts.edit_post',compact('post'));
    }

    public function create()
    {
//        $data = Category::all();
        return view('admin.posts.create_post');
    }


    public function store(PostStoreRequest $request)
    {
        $data = $request->except('image');
        $post = new Post($data);
        $post->slug = Str::slug($post->title);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($this->validateImage($image)){
                $nameImage = $image->getClientOriginalName();
                $image->move('storage/images_post/',$nameImage);
                $post->preview = $nameImage;
            }else{
                return redirect()->back()->withInput()->withErrors('Формат изображения не подходит');
            }
        }else{
            $post->preview = 'default.jpg';
        }
        $post->save();
        return redirect()->route('admin.post.one',$post->id)->with(['success'=>'Проект успешно добавлен']);
    }

    public function update($id, ProjectUpdateRequest $request)
    {
//        $data =$request->except('image');
//        $data['carousel'] = $request->input('carousel', '0');
//        $data['is_published'] = $request->input('is_published', '0');
//
//        $project = Project::with('category','image')->findOrFail($id);
//        $project->update($data);
////        dd($request->file('image'));
//        if ($request->hasFile('image')) {
//
//            $answer = $request->file('image');
//            if ($this->validateImage($answer)) {
//                foreach ($answer as $image) {
//                    $nameImage = md5($image->getFilename()) . '.' . $image->extension();
//                    $arrayImageModel = Image::with('project')->where('project_id', '=', $project->id)->get();
////dd($nameImage);
//                    foreach ($arrayImageModel as $array) {
////                        dd($nameImage == $array->name);
//                        if ($nameImage == $array->name) {
//                            echo 'есть <br>';
//                            echo "То что загрузили: {$nameImage}<br>";
//                            echo "То с чем сравниваем: {$array->name}<br>";
//                        }
//                        echo 'нет <br>';
//                        echo "То что загрузили: {$nameImage}<br>";
//                        echo "То с чем сравниваем: {$array->name}<br>";
//                    }
//                    dd($arrayImageModel);
//                    //                    $image->move('storage/images_project/',$nameImage);
//
//                }
//                return redirect()->route('admin.project.one',$id)->with(['success'=>'Проект успешно добавлен']);
//            }
//
//            return redirect()->back()->withInput()->withErrors('Формат изображения не подходит');
//        }
//        return redirect()->route('admin.project.one',$id)->with(['success'=>'Проект успешно добавлен']);

    }

    public function destroy($id)
    {
//        $project = Project::with('image')->firstOrFail($id);

    }

    private function validateImage($arr)
    {
        $rules = ['jpg', 'png', 'jpeg', 'bmp'];
        if (in_array($arr->extension(), $rules)) {
            return true;
        }else{
            return false;
        }
    }
}
