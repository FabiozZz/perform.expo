@extends('layouts.adminLayout')
@section('content')
    <table class="table table-hover text-center">
        <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Площадь</th>
            <th>Стоимость</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="table-striped">
        @foreach($data as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->square}}</td>
                <td>{{$project->price}}</td>
                <td><a class="btn btn-outline-primary" href="{{route('admin.project.one',$project->id)}}">Просмотреть</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
{{$data->render()}}
@endsection
