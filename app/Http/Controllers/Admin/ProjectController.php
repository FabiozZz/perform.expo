<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Error;

class ProjectController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        $data = Project::with('category')->paginate(20);
        return view('admin.projects.index',compact('data'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function one($id)
    {
        $project = Project::with('category')->findOrFail($id);
        return view('admin.projects.one',compact('project'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $project = Project::with('category')->findOrFail($id);
        return view('admin.projects.edit_project',compact('project'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $data = Category::all();

        return view('admin.projects.create_project', compact('data'));
    }

    /**
     * @param ProjectStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data =$request->except('image');

        $data['carousel'] = $request->input('carousel', '0');
        $data['is_published'] = $request->input('is_published', '0');
        $project = new Project($data);

        if ($request->hasFile('image')) {

//            dd($project->image);
            $answer = $request->file('image');
            $count = count($answer);
            $project->save();

            if ($this->validateImage($answer)) {
                foreach ($answer as $image) {
                    $nameImage = $image->getClientOriginalName();
                    $image->move('storage/images_project/',$nameImage);
                    Image::create([
                        'project_id' => $project->id,
                        'name' => $nameImage,
                    ]);
                }
                return redirect()->route('admin.project.one',$project->id)->with(['success'=>'Проект успешно добавлен']);
            }
            return redirect()->back()->withInput()->withErrors('Формат изображения не подходит');

        }
    }

    /**
     * @param $id
     * @param ProjectUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, ProjectUpdateRequest $request)
    {
        $data =$request->except('image');
        $data['carousel'] = $request->input('carousel', '0');
        $data['is_published'] = $request->input('is_published', '0');

        $project = Project::with('category','image')->findOrFail($id);
        $project->update($data);
//        dd($request->file('image'));
        if ($request->hasFile('image')) {

            $answer = $request->file('image');
            if ($this->validateImage($answer)) {
                foreach ($answer as $image) {
                    $nameImage = md5($image->getFilename()) . '.' . $image->extension();
                    $arrayImageModel = Image::with('project')->where('project_id', '=', $project->id)->get();
//dd($nameImage);
                    foreach ($arrayImageModel as $array) {
//                        dd($nameImage == $array->name);
                        if ($nameImage == $array->name) {
                            echo 'есть <br>';
                            echo "То что загрузили: {$nameImage}<br>";
                            echo "То с чем сравниваем: {$array->name}<br>";
                        }
                        echo 'нет <br>';
                        echo "То что загрузили: {$nameImage}<br>";
                        echo "То с чем сравниваем: {$array->name}<br>";
                    }
                    dd($arrayImageModel);
                    //                    $image->move('storage/images_project/',$nameImage);

                }
                return redirect()->route('admin.project.one',$id)->with(['success'=>'Проект успешно добавлен']);
            }

            return redirect()->back()->withInput()->withErrors('Формат изображения не подходит');
        }
        return redirect()->route('admin.project.one',$id)->with(['success'=>'Проект успешно добавлен']);

    }

    public function destroy($id)
    {
        $project = Project::with('image')->firstOrFail($id);

    }

    /**
     * @param array $arr
     * @return bool
     */
    private function validateImage(array $arr)
    {

        $rules = ['jpg', 'png', 'jpeg', 'bmp'];
        foreach ($arr as $image) {
            if (in_array($image->extension(), $rules)) {
                continue;
            }else{
                return false;
            }
        }
        return true;
    }
}
