@extends('layouts.guestLayout')
@section('content')
{{--    <div class="container" style="font-family: Roboto, verdana,sans-serif;font-size: 1.7em">--}}
{{--        <div class="text-center col-10 mr-auto ml-auto mt-5">--}}

{{--            <h1 class="mt-5">{{$project->title}}</h1>--}}

{{--            <p class="mt-5">{!!$project->content!!}</p>--}}
{{--            <p class="mt-5">Общая площадь: {{$project->square}} м<sup>2</sup></p>--}}
{{--            <p class="mt-5">Общий бюджет реализации: {{number_format($project->price)}} &#8381;</p>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            @foreach($project->image as $image)--}}
{{--            <div class="col-sm-4 mt-4 mb-4">--}}
{{--                <div class="card border-0 bg-transparent">--}}
{{--                    <div class="card-img" style="width: 100%;--}}
{{--                        height: 45vh;--}}
{{--                        background-image: url('{{asset('storage/images_project/'.$image->name)}}');--}}
{{--                        background-size: contain;--}}
{{--                        background-position: center;--}}
{{--                        background-repeat: no-repeat;"--}}
{{--                        ></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
