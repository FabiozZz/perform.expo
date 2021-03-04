<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function deleteImageProject(Request $request, $id)
    {
        $input = $request->deleteImage;
        foreach ($input as $image) {
            $imageModel = Image::where('name','=',$image)->firstOrFail();
            $imageModel->delete();
            \File::delete(storage_path('app/public/images_project/') .$id.'/'. $image);
        }
        return response()->json(['success' => 'Данные удалены' /*'Изображение удалено'*/]);
    }

    public function viewChangeImage($id)
    {
        $project = Project::with('image')->findOrFail($id);
        return view('admin.projects.changePreview',compact('project'));
    }

    public function changeImage(Request $request,$id)
    {
        $project = Project::with('image')->findOrFail($id);
        $images = Image::where('project_id', '=', $project->id)->get();
        $carousel = $request->carousel;
        foreach ($images as $image) {
            if (in_array($image->name, $carousel)) {
                $image->carousel = 1;
            }else{
                $image->carousel = 0;
            }
            $image->update();
        }
        $project->preview = $request->preview;
        $project->update();
        return response()->json(['success' => 'все получилось']);
    }
}
