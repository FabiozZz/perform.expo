@extends('layouts.app')
@section('content')
    <table class="table table-hover text-center">
        <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Статус</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="table-striped">
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                @if($post->is_published)
                <td>Опубликовано</td>
                @else
                    <td>Черновик</td>
                @endif
                <td><a class="btn btn-outline-primary" href="{{route('admin.project.one',$post->id)}}">Просмотреть</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$posts->render()}}
@endsection

