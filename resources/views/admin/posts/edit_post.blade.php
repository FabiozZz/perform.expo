@extends('layouts.adminLayout')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <form class="row justify-content-center m-auto"
          method="POST"
          action="{{--{{route('admin..update',$project->id)}}--}}"
          enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <div class="col-xl-9 col-12">
            <div class="form-group  border p-3">
                <div class="form-group">
                    <label class="col-form-label-sm" for="except">Введите краткое описание проекта
                    </label>
                    <textarea placeholder="Вводить здесь ..." class="form-control" name="except" id="except" rows="3">{{$post->except}}</textarea>
                </div>
                <div class="form-group">
                    <label class="col-form-label-sm" for="content">Описание проекта</label>
                    <textarea placeholder="Вводить здесь ..." class="form-control" name="content" id="summernote" rows="3">{{$post->content}}</textarea>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-12 border p-3">
            <div class="form-group ">
                <label class="w-100 col-form-label-sm" for="title">Введите заголовок проекта
                    <input class="form-control" type="text" name="title" id="title" value="{{$post->title ?? ''}}" placeholder="Вводить здесь ...">
                </label>
            </div>
            <div class="form-group">
                <label class="w-100 form-check-label" for="is_published">Опубликовать проект
                    <input hidden type="checkbox" name="is_published" id="is_published" value="0">
                    <input @if($post->is_published == 1) checked @endif class="form-input" name="is_published" id="is_published" value="1" type="checkbox">
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
