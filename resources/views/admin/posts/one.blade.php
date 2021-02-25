@extends('layouts.app')
@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->except}}</p>
    <p>{{$post->content}}</p>
    <a class="btn btn-outline-success" href="{{route('admin.post.edit',$post->id)}}">Редактировать</a>
    <ul class="list-unstyled list-group-horizontal row">
        @foreach($post->image as $image)
            @isset($image)
                <li class=""><div style='width: 200px;height: 200px; background-image: url({{asset('storage/images_project/'.$image->name)}});background-size: contain;background-position: center; background-repeat: no-repeat'></div></li>
            @endisset
        @endforeach
    </ul>
@endsection
