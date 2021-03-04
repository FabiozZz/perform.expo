@extends('layouts.guestLayout')
@section('content')
    <div class="container-fluid text-white" style="font-family: 'Liberation Sans',Arial,sans-serif;background-color: black;">
        <div class="col-12 text-center pt-5" style="">
            <h1 style="font-size: 5em;font-weight: 800"><span class="d-block">АРХИТЕКТУРНО</span> <span class="d-block">ИНТЕРЬЕРНЫЙ</span> <span class="d-block">БЛОГ</span></h1>
            <p style="font-size: 1.5em">Новости, частые ошибки, интересные решения</p>
        </div>
        <div class="container">
        <div class="row mt-5 mb-5" style="font-size: 0.7em;">
            @foreach ($posts as $post)
                <div class="col-sm-12 text-white col-md-6 col-lg-4 mt-5" style="height: 30%; font-weight: bolder; color: black">
                    <div class="card text-left" style="background-color: transparent; border: none">
                        @isset($post->preview)
                            <div class="img-fluid" style="width: 100%;height: 250px;background-image: url('{{ asset('storage/images_post/'.$post->preview) }}'); background-size: cover;background-repeat: no-repeat; background-position: center"></div>
                            {{--                            <img class="card-img-top" src="" alt="">--}}
                        @endisset
                        <div class="card-body float-left p-0 mt-4">
                            <h3 class="card-title font-weight-bolder">{{ $post->title }}</h3>
                            <p class="font-weight-lighter" style="font-size: small">{{$post->except}}</p>
                            {{--                            <span class="d-block small">Общая стоимость: {{ $post->price }}</span>--}}
{{--                            <span class="d-block small">Общая площадь: {{ $post->square }}</span>--}}
                            <a class="btn text-white bg-secondary p-2 mt-3" style="background-color: black"
                               href="{{--{{ route('home.one', , $post->slug]) }}--}}">Смотреть</a>
                        </div>
                    </div>
                </div>
            @endforeach
                @php($paginator = $posts->render()->paginator)
                            @include('vendor.pagination.simple-bootstrap-4', $paginator)
                {{--            {{$posts->render()}}--}}
        </div>
        </div>
@endsection
