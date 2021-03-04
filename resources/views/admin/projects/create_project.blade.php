@extends('layouts.adminLayout')
@section('content')

    <form class="row justify-content-center m-auto"
          method="POST"
          action="{{route('admin.project.store')}}"
          enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="form-group col-xl-6 col-sm-12 row">
            <div class="col-md-6 col-sm-12">
                <div class="col-sm-12">
                    <label class="w-100 col-form-label-sm" for="title">Введите заголовок проекта
                        <input class="form-control" type="text" name="title" id="title" placeholder="Вводить здесь ...">
                    </label>
                </div>
                <div class="col-sm-12">
                    <label class="w-100 col-form-label-sm" for="square">Введите площадь проекта
                        <input class="form-control" type="number" name="square" id="square" placeholder="Вводить здесь ...">
                    </label>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="col-sm-12">
                    <label class="w-100 col-form-label" for="price">Стоимость проекта
                        <input class="form-control" type="number" name="price" id="price" placeholder="Вводить здесь ...">
                    </label>
                </div>
                <div class="col-sm-12">
                    <label class="w-100 col-form-label-sm" for="image">Загрузите картинки для проекта
                        <input class="form-control-file"
                               name="image[]"
                               id="image"
                               type="file"
                               accept=".jpg, .jpeg, .png, .gif, .bmp"
                               multiple>
                    </label>
                </div>
            </div>

            <div class="form-group col-12">

                <select class="w-100 form-control" name="category_id" id="category_id">
                    <option selected>Выберете категорию</option>
                    @foreach($data as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-xl-6 col-sm-12">
            <label class="col-form-label-sm" for="except">Введите краткое описание проекта
            </label>
            <textarea placeholder="Вводить здесь ..." class="form-control" name="except" id="except" rows="3"></textarea>

            <label class="col-form-label-sm" for="content">Описание проекта</label>
            <textarea placeholder="Вводить здесь ..." class="form-control" name="content" id="content" rows="3"></textarea>
        </div>
        <div class="row col-12">
            <div class="form-group text-center col-md-6 col-sm-12">
                <label class="w-100 form-check-label" for="is_published">Опубликовать проект
                    <input class="form-input" name="is_published" id="is_published" value="1" type="checkbox">
                </label>
            </div>
            <div class="form-group text-center col-md-6 col-sm-12">
                <label class="w-100 form-check-label" for="carousel">Показывать в каруселе
                    <input class="form-input" name="carousel" id="carousel" value="1" type="checkbox">
                </label>
            </div>
        </div>

        <!-- Button trigger modal -->

        <button type="button" id="modal-open" class="btn d-none btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
            Launch
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content modal-lg">
                    <div class="form-group">
                        <h5>Выберете картинку для превью</h5>
                        <div class="m-auto d-flex flex-row" style="overflow-x: auto;width: 100%;"  id="preview"></div>
                    </div>
                    <div class="form-group group-carousel">
                        <h5>Выберете картинки для карусели</h5>
                        <div class="m-auto d-flex flex-row" style="overflow-x: auto;width: 100%;"  id="carousel"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="modal-close" onclick="$('#image').val('')" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button"  class="btn btn-primary" data-dismiss="modal">Save</button>
                    </div>
                </div>
                <style type="text/css">
                    .input-image > input{ /* HIDE RADIO */
                        visibility: hidden; /* Makes input not-clickable */
                        position: absolute; /* Remove input from document flow */
                    }
                    .input-image > input + img{ /* IMAGE STYLES */
                        cursor:pointer;
                        border:2px solid transparent;
                    }
                    .input-image > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
                        border:2px solid #ffe924;
                    }
                </style>
            </div>
        </div>
        <input class="form-control" type="submit" value="Отправить">

    </form>

    <script>
        function readImage(file,id) {
            // Check if the file is an image.
            let img = document.querySelector(`#${id}`);
            const reader = new FileReader();
            reader.addEventListener('load', (event) => {
                img.src = event.target.result;
            });
            reader.readAsDataURL(file);
        }

        $('#image').on('change', function (e) {
            const fileList = e.target.files;
            let idPreview = 'preview';
            let idCarousel = 'carousel';
            let i = 0;
            let preview,carousel,reader = new FileReader();
            reader.onload = function () {

            };
            for (const file of fileList) {
                $('.form-group #preview').append(`<label class="input-image d-inline-block" for="${idPreview+i+'image'}">` +
                    `<input type='radio' class="" value="${file.name}" name="preview" id="${idPreview+i+'image'}">` +
                    `<img id="${idPreview+(i+1)}" src="" width="100" height="100">` +
                    '</label>');
                $('.group-carousel #carousel').append(`<label  class="input-image d-inline-block" for="${idCarousel+i+'image'}">` +
                    `<input type='checkbox'  value="${file.name}" name="carousel-image[]" id="${idCarousel+i+'image'}">` +
                    `<img id="${idCarousel + (i+1)}" src="" width="100" height="100">` +
                    '</label>');
                preview = idPreview + (i+1);
                carousel = idCarousel + (i+1);
                readImage(file, preview);
                readImage(file, carousel);
                i++;
            }
            $('#modal-open').trigger('click');
            $(".group-carousel input").on("click", function() {

                if($(".group-carousel input:checked").length >= 2) { // Не больше 2-х checkbox

                    $(".group-carousel input:not(:checked)").attr("disabled", true);

                } else {

                    $(".group-carousel input:disabled").attr("disabled", false);

                }

            });
        });

    </script>

@endsection
