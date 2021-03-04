@extends('layouts.app')
@section('content')
    <style>
        .inputImage{
            position: relative;
        }
        .inputChecked:checked + .inputImage::before{
            content: '';
            position: absolute;
            top: 0;left: 0;
            width: 100%;height: 100%;
            background-color: rgba(255, 0, 0, 0.4);;
        }
    </style>
    <form id="changeForm" action="" method="post">
        @method('POST')
        @csrf
        <h1 class="text-center">Выберете превью</h1>
        <div class="row flex-row">
            @foreach($project->image as $image)
                <label for="{{$image->id}}preview">
                    <input class="inputChecked d-none" type="radio" name="preview" id="{{$image->id}}preview" value="{{$image->name}}">
                    <div class="inputImage" style='width: 200px;height: 200px; background-image: url({{asset('storage/images_project/'.$project->id.'/'.$image->name)}});background-size: contain;background-position: center; background-repeat: no-repeat'></div></label>
            @endforeach
        </div>
        <h1 class="text-center">Выберете изображения для карусели</h1>
        <div class="row flex-row group-carousel">
            @foreach($project->image as $image)
                <label for="{{$image->id}}carousel">
                    <input class="inputChecked d-none" type="checkbox" name="carousel[]" id="{{$image->id}}carousel" value="{{$image->name}}">
                    <div class="inputImage" style='width: 200px;height: 200px; background-image: url({{asset('storage/images_project/'.$project->id.'/'.$image->name)}});background-size: contain;background-position: center; background-repeat: no-repeat'></div></label>
            @endforeach
        </div>
        <button id="changeButton" class="btn btn-success btn-lg">Save</button>
    </form>
    <script>
        document.onload = function () {
            $(".group-carousel input").on("click", function() {
                if($(".group-carousel input:checked").length >= 2) { // Не больше 2-х checkbox
                    $(".group-carousel input:not(:checked)").attr("disabled", true);
                } else {
                    $(".group-carousel input:disabled").attr("disabled", false);
                }
            });
        };
        $('button#changeButton').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{route('admin.changeImage.change',$project->id)}}',
                method: 'post',
                // dataType: 'json',
                data: $('form#changeForm').serialize(),
                success: function (data) {
                    alert(data.success);
                    window.location.href = '{{back()->getTargetUrl()}}'
                }
            })
        });
    </script>
@endsection
