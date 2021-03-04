@extends('layouts.adminLayout')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <form class="row justify-content-center m-auto"
          method="POST"
          action="{{route('admin.project.update',$project->id)}}"
          enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="form-group col-xl-6 col-sm-12 row">
            <div class="col-md-6 col-sm-12">
                <div class="col-sm-12">
                    <label class="w-100 col-form-label-sm" for="title">Введите заголовок проекта
                        <input class="form-control" type="text" name="title" id="title" value="{{old('title',$project->title)}}" placeholder="Вводить здесь ...">
                    </label>
                </div>
                <div class="col-sm-12">
                    <label class="w-100 col-form-label-sm" for="square">Введите площадь проекта
                        <input class="form-control" type="number" name="square" id="square" value="{{old('square',$project->square)}}" placeholder="Вводить здесь ...">
                    </label>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="col-sm-12">
                    <label class="w-100 col-form-label" for="price">Стоимость проекта
                        <input class="form-control" type="number" name="price" id="price" value="{{old('price',$project->price)}}" placeholder="Вводить здесь ...">
                    </label>
                </div>
                <div class="col-sm-12">
                    <label class="w-100 col-form-label-sm" for="image">Загрузите картинки для проекта
                        <input class="form-control-file" name="image[]" id="image" type="file" multiple>
                    </label>
                </div>
            </div>

            <div class="form-group col-12">
                <select class="w-100 form-control" name="category_id" id="category_id">
                    @foreach($project->category->all() as $category)

                        <option value="{{$category->id}}" @if($project->category->category == $category->category)selected @endif>{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-xl-6 col-sm-12">
            <label class="col-form-label-sm" for="except">Введите краткое описание проекта
            </label>
            <textarea placeholder="Вводить здесь ..." class="form-control" name="except" id="except" rows="3">{{old('except',$project->except)}}</textarea>

            <label class="col-form-label-sm" for="content">Описание проекта</label>
            <textarea placeholder="Вводить здесь ..." class="form-control" name="content" id="summernote" rows="3">{{old('content',$project->content)}}</textarea>
        </div>
        <div class="row col-12">
            <div class="form-group text-center col-md-6 col-sm-12">
                <label class="w-100 form-check-label" for="is_published">Опубликовать проект
                    <input @if($project->is_published == 1) checked @endif class="form-input" name="is_published" id="is_published" value="1" type="checkbox">
                </label>
            </div>
            <div class="form-group text-center col-md-6 col-sm-12">
                <label class="w-100 form-check-label" for="carousel">Показывать в каруселе
                    <input @if($project->carousel == 1) checked @endif class="form-input" name="carousel" id="carousel" value="1" type="checkbox">
                </label>
            </div>
        </div>
        <input class="form-control" type="submit" value="Отправить">

    </form>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
