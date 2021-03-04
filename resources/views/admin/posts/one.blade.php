@extends('layouts.app')
@section('content')
    <div style="width: 350px; height: 350px;background-image: url('{{asset('storage/images_post/'.$post->preview)}}');background-repeat: no-repeat;background-position: center;background-size: contain"></div>
    <h1>{{$post->title}}</h1>
    <p>{{$post->except}}</p>
    <p>{!!$post->content!!}</p>
    <a class="btn btn-outline-success" href="{{route('admin.post.edit',$post->id)}}">Редактировать</a>
@endsection
