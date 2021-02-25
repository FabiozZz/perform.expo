
<nav class="navbar navbar-expand-lg navbar-dark @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'home') @endif" style="background-color: black;
    font-weight: 600;
@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'home')
    background-color: transparent;
    top: 0;left: 0;
    right: 0;
        position: absolute;
    z-index:4;

@else
    background-color: black;
@endif
    width: 100%;
    max-width: 1700px;
    font-size:1.3em;
    margin: auto;
    font-family:'Roboto',serif;
    text-transform:uppercase;
    text-shadow: 0px 2px 0 rgba(0, 0, 0, 0.0);">
    <a class="navbar-brand" href="{{route('home')}}"><img width="100" height="40" src="{{asset('storage/image_site/logo/logo.png')}}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Проекты
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Архетиктурное проектирование</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Дизайн интерьеров</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Контакты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Блог</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            {{--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
            <button class="btn btn-outline-success my-2 my-lg-0 m-auto" type="submit">Search</button>
        </form>
    </div>
</nav>
