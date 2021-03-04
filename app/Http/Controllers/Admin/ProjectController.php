<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Error;
use function PHPUnit\Framework\directoryExists;
use function PHPUnit\Framework\fileExists;

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
        $data =$request->except(['image','preview']);

        $data['carousel'] = $request->input('carousel', '0');
        $data['is_published'] = $request->input('is_published', '0');
        $project = new Project($data);
        $arrCarousel = $data['carousel-image'];
        $project->preview = $request->preview;
//        dd($request);
//
        $project->save();
        if ($request->hasFile('image')) {
            $answer = $request->file('image');
            $path = 'public/images_project/'.$project->id.'/';
            if (Storage::disk('local')->exists($path)) {
                Storage::disk('local')->makeDirectory($path);
            }
            if ($this->validateImage($answer)) {
                foreach ($answer as $image) {
                    $nameImage = $image->getClientOriginalName();
                    $image->move(storage_path('app/public/images_project/').$project->id.'/',$nameImage);
                    Image::create([
                        'project_id' => $project->id,
                        'carousel' => in_array($nameImage,$arrCarousel) ? 1: 0,
                        'name' => $nameImage,
                    ]);
                }
                return redirect()->route('admin.project.one',$project->id)->with(['success'=>'Проект успешно добавлен']);
            }
            return redirect()->back()->withInput()->withErrors('Формат изображения не подходит');

        }
    }


    public function addImageProject(Request $request, $id)
    {
        $addImages = $request['addImage'];
        $project = Project::with('image')->findOrFail($id);
        $pathProject = storage_path('app/public/images_project/' . $id . '/');
        foreach ($addImages as $addImage) {
            if (file_exists($pathProject . $addImage->getClientOriginalName())) {
                continue;
            }else{
                $nameImage = $addImage->getClientOriginalName();
                $addImage->move(storage_path('app/public/images_project/').$project->id.'/',$nameImage);
                Image::create([
                    'project_id' => $project->id,
                    'name' => $nameImage,
                ]);
            }
        }
//        if ($request->hasFile('image')) {
//            $answer = $request->file('image');
//            $path = 'public/images_project/'.$project->id.'/';
//            if (Storage::disk('local')->exists($path)) {
//                Storage::disk('local')->makeDirectory($path);
//            }
//            if ($this->validateImage($answer)) {
//                foreach ($answer as $image) {
//                    $nameImage = $image->getClientOriginalName();
//                    $image->move(storage_path('app/public/images_project/').$project->id.'/',$nameImage);
//                    Image::create([
//                        'project_id' => $project->id,
//                        'carousel' => in_array($nameImage,$arrCarousel) ? 1: 0,
//                        'name' => $nameImage,
//                    ]);
//                }
//            }
//        }
        //        dd($project->image);
//        $projectImage = $project->image;
        return response()->json(['success'=>"Файлы загружены"]);
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
                    $nameToUser = $image->getClientOriginalName();
                    $namesToBase = [];
                    foreach ($project->image as $imageProject) {
                        $namesToBase[] = $imageProject->name;

                    }
                    if (!in_array($nameToUser, $namesToBase)) {
                        $image->move('storage/images_project/',$nameToUser);
                        Image::create([
                            'project_id'=>$project->id,
                            'name' => $nameToUser,
                        ]);
                    }
//                    dd($arrayImageModel);
                    //                    $image->move('storage/images_project/',$nameImage);

                }
                return redirect()->route('admin.project.one',$id)->with(['success'=>'Проект успешно обновлен']);
            }

            return redirect()->back()->withInput()->withErrors('Формат изображения не подходит');
        }
        return redirect()->route('admin.project.one',$id)->with(['success'=>'Проект успешно обновлен']);

    }

    public function destroy($id)
    {
        $project = Project::with('image')->firstOrFail($id);
        $project->delete();
        return redirect()->route('admin.home')->with(['success' => 'Проект удален']);
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
