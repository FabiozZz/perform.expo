@extends('layouts.guestLayout')
@section('content')
    <h1>{{$project->title}}</h1>
    <p>{!!$project->content!!}</p>

@endsection
