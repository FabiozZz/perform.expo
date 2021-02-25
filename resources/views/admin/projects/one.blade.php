@extends('layouts.app')
@section('content')
    <h1>{{$project->title}}</h1>
    <p>{{$project->except}}</p>
    <p>{{$project->content}}</p>
    <p>Общая площадь проекта: {{$project->square}}</p>
    <p>Общая стоимость проекта: {{$project->price}}</p>
    <a class="btn btn-outline-success" href="{{route('admin.project.edit',$project->id)}}">Редактировать</a>
    <ul class="list-unstyled list-group-horizontal row">
        @foreach($project->image as $image)
            @isset($image)
                <li class=""><div style='width: 200px;height: 200px; background-image: url({{asset('storage/images_project/'.$image->name)}});background-size: contain;background-position: center; background-repeat: no-repeat'></div></li>
            @endisset
        @endforeach
    </ul>
@endsection
