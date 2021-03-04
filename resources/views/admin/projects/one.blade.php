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
    <h3>Обложка</h3>
    <div style="width: 300px;height: 300px;background-image:url('{{asset('storage/images_project/'.$project->id.'/'.$project->preview)}}');
        background-size: contain;background-repeat: no-repeat; background-position: center"></div>
    <h3>картинки в карусели</h3>
    <div class="row">

        @foreach($project->image as $image)
            @if($image->carousel)
                <div class="col-3" style="width: 300px;height: 300px;background-image:url('{{asset('storage/images_project/'.$project->id.'/'.$image->name)}}');
                    background-size: contain;background-repeat: no-repeat; background-position: center"></div>
            @endif
        @endforeach
    </div>

    <h1>{{$project->title}}</h1>
    <p>{{$project->except}}</p>
    <p>{{$project->content}}</p>
    <p>Общая площадь проекта: {{$project->square}}</p>
    <p>Общая стоимость проекта: {{$project->price}}</p>
    <div class="row align-content-center">
        <div class="col-2">
            <a class="btn btn-outline-success" href="{{route('admin.project.edit',$project->id)}}">Редактировать</a>
        </div>
        <div class="col-2">
            <form enctype="multipart/form-data" id="formAddImage" method="post">
                @method('POST')
                @csrf
                <label class="btn btn-outline-info" for="inputAddImage">Добавить картинки
                    <input accept=".jpg, .jpeg, .png, .gif, .bmp" class="d-none" type="file" id="inputAddImage" multiple name="addImage[]"></label>
                <button id="submitAddImage" class="btn btn-success" type="submit">Отправить</button>
            </form>
        </div>
        <div class="col-3">
            <a href="{{route('admin.changeImage.view',$project->id)}}" class="btn btn-outline-dark">Сменить превью и карусель</a>
        </div>

        <script>
            $('input#addImage').on('click', function (){
                $('button#submitAddImage').removeClass('d-none');
            });
            $('#formAddImage').on('submit',
                function (e) {
                    e.preventDefault();
                    let formData = new FormData(e.currentTarget);
                    $.ajax({
                        url: '{{route('admin.addImageProject',$project->id)}}',
                        method: 'post',
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (data) {
                            alert(data.success);
                            window.location.reload();
                        }
                    });
                });
        </script>
    </div>
    <h3 class="text-center">выберете картинки для удаления</h3>
    <form class="list-unstyled list-group-horizontal row" method="post" id="delete">
        @method('POST')
        @csrf
        <div class="form-group">
            @foreach($project->image as $image)

                @if($image->name <> $project->preview)
                    @if(!$image->carousel)
                        @isset($image)
                            <label for="{{$image->id}}">
                                <input class="inputChecked d-none" type="checkbox" name="deleteImage[]" id="{{$image->id}}" value="{{$image->name}}">
                                <div class="inputImage" style='width: 200px;height: 200px; background-image: url({{asset('storage/images_project/'.$project->id.'/'.$image->name)}});background-size: contain;background-position: center; background-repeat: no-repeat'></div></label>
                        @endisset
                    @endif
                @endif
            @endforeach
        </div>
        <button type="button">Удалить</button>
    </form>

    <script>
        $('#delete > button').on('click', function () {
            let data = $('#delete').serialize();
            // console.log(data);
            $.ajax({
                url:'{{route('delete.image.project',$project->id)}}',
                type: 'POST',
                data: data,
                success: function (data) {
                    alert(data.success);
                    window.location.reload();
                }
            })
        });

        function changePreview() {
            let inputs = $('form > input [checked=true]');
        }


    </script>
@endsection
