
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;
    font-weight: 600;
@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'home')
    background-color: transparent;
    top: 0;left: 0;
    right: 0;
        position: absolute;
    z-index:44;

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
    <a class="navbar-brand" href="{{route('home')}}"><img width="140" height="60" src="{{asset('storage/image_site/logo/logo.png')}}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto">
            <li class="nav-item @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'home') active @endif">
                <a class="nav-link {{request()->is('/')? 'active' : ''}}" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{request()->is('design*','architect*')? 'active' : ''}} dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Проекты
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item {{request()->is('architect*')? 'active' : ''}}" href="#">Архетиктурное проектирование</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item {{request()->is('design*')? 'active' : ''}}" href="#">Дизайн интерьеров</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('services*')? 'active' : ''}}" href="{{route('services')}}">Услуги</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Контакты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->is('blog*')? 'active' : ''}}" href="{{route('blog')}}">Блог</a>
            </li>
        </ul>
            {{--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
            <button class="btn my-2 my-lg-0 bg-white rounded-pill" style="width: 10%;" type="submit">Contacts</button>
    </div>
</nav>
