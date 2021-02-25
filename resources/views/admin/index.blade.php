@extends('layouts.app')
@section('content')
    <h1>Страница админа</h1>
    <ul>
        <li>
            <a href="{{route('admin.project.create')}}">Создать проект</a>
        </li>
        <li>
            <a href="{{route('admin.post.create')}}">Создать пост</a>
        </li>
        <li>
            <a href="{{route('admin.project.home')}}">Все проекты</a>
        </li>
        <li>
            <a href="{{route('admin.post.home')}}">Все посты</a>
        </li>
    </ul>
@endsection
