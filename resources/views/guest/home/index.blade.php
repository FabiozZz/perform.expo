@extends('layouts.guestLayout')
@section('title')Главная страница@endsection
@section('content')
    @include('guest.inc.carousel',$carousel)

    <div class="wh100 row" style="background-color:#3196ff; position: relative;">
        <div class="col-6" style="">
            <a style="" class="" href="#">
                <div
                    style="width: 100%;
                    height: 60%;
                    background-image: url('{{ asset('storage/image_site/other/architect.png') }}');
                    background-size: 70%;
                    background-position: center;
                    background-repeat: no-repeat">
                </div>
                <h3 class='text-center font-weight-bolder' style="font-size: 3em ;font-family: 'Times New Roman', Times, serif;color:black">
                    <pre>Архетиктурное
проектирование</pre></h3>
            </a>
        </div>
        <div class="col-6">
            <a href="#">
                <div
                    style="width: 100%;
                    height: 60%;
                    background-image: url('{{ asset('storage/image_site/other/design.png') }}');
                    background-size: 70%;
                    background-position: center;
                    background-repeat: no-repeat">
                </div>
            <h3 class='text-center font-weight-bolder' style="font-size: 3em ;font-family: 'Times New Roman', Times, serif;color:black">
                    <pre>Дизайн
Интерьеров</pre></h3>
            </a>
        </div>
    </div>

    <div class="container mt-5 mb-5" style="font-size: 1.5em">
        <div class="w-100 text-center m-auto col-lg-6">
        <h1 class="font-weight-bold">Наши проекты</h1>
            <p>Портфолио Concept Interiors насчитывает десятки реализованных проектов. Среди них и проекты жилых домов, и
                интерьеры общественных пространств, и разработка коммерческих помещений. Предлагаем вам ознакомиться с
                некоторыми из них.</p>
        </div>
        <div class="row mt-5 mb-5" style="font-size: 0.7em;">
            @foreach ($data as $project)
                <div class="col-sm-12 col-md-6 col-lg-4 mt-5" style="height: 30%; font-weight: bolder; color: black">
                    <div class="card text-left" style="background-color: transparent; border: none">
                            <div class="img-fluid" style="width: 100%;height: 250px;background-image: url('{{is_file(public_path("storage/images_project/" .$project->id.'/'.$project->preview))? asset("storage/images_project/" . $project->id ."/".$project->preview) : asset("storage/images_project/".$project->preview)}}'); background-size: cover;background-repeat: no-repeat; background-position: center"></div>
                        <div class="card-body float-left p-0 mt-4">
                            <h3 class="card-title font-weight-bolder">{{ $project->title }}</h3>
                            <span class="d-block small">Общая стоимость: {{ $project->price }}</span>
                            <span class="d-block small">Общая площадь: {{ $project->square }}</span>
                        <a class="btn text-white p-2 mt-3" style="background-color: black"
                            href="{{ route('home.one', [$project->category->slug, $project->slug]) }}">Смотреть</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
