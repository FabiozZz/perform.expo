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
                <div class="col-sm-12 col-md-6 col-lg-4" style="height: 30%;">
                    <div class="card text-left">
                        @isset($project->preview)
                            <div class="img-fluid" style="width: 100%;height: 200px;background-image: url('{{ asset("storage/images_project/{$project->preview}") }}'); background-size: contain;background-repeat: no-repeat; background-position: center"></div>
{{--                            <img class="card-img-top" src="" alt="">--}}
                        @endisset
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">{{ $project->title }}</h4>
                            <p class="card-text">{{ $project->except }}</p>
                            <span class="small">Общая стоимость: {{ $project->price }}</span>
                            <span class="small">Общая площадь: {{ $project->square }}</span>
                        </div>
                        <a class="btn btn-dark w-50"
                            href="{{ route('home.one', [$project->category->slug, $project->slug]) }}">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
