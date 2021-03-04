@extends('layouts.guestLayout')
@section('content')
    <div class="container-fluid text-white text-center" style="background-color: black;">
        <div class="container">
            <div class="row">
                <div class="col-9 m-auto">
                    <h1 style="font-size: xxx-large; font-weight: bolder">Дизайн интерьеров</h1>
                    <p style="font-size: large">ЗАДАЧА ЗАКАЗЧИКА МОЖЕТ БЫТЬ РАЗНОЙ: ОТ РАССТАНОВКИ МЕБЕЛИ В УЖЕ ГОТОВОМ ПОМЕЩЕНИИ ДО ПЕРЕПЛАНИРОВКИ И ПОЛНОЙ СМЕНЫ ИНТЕРЬЕРА. В ЗАВИСИМОСТИ ОТ ЭТОГО МЫ ПРЕДЛАГАЕМ НА ВЫБОР НЕСКОЛЬКО ПАКЕТОВ УСЛУГЗАДАЧА ЗАКАЗЧИКА МОЖЕТ БЫТЬ РАЗНОЙ: ОТ РАССТАНОВКИ МЕБЕЛИ В УЖЕ ГОТОВОМ ПОМЕЩЕНИИ ДО ПЕРЕПЛАНИРОВКИ И ПОЛНОЙ СМЕНЫ ИНТЕРЬЕРА. В ЗАВИСИМОСТИ ОТ ЭТОГО МЫ ПРЕДЛАГАЕМ НА ВЫБОР НЕСКОЛЬКО ПАКЕТОВ УСЛУГ</p>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-between text-left">
                    <div class="col-sm-4 col-md-2 mt-4 mb-5">
                        <div class="h-50">
                            <img style="height: auto; width: 100%;" src="{{asset('storage/image_site/other/1.png')}}" alt="">
                        </div>
                        <div class="h-50">
                            <p>Включает в себя : Разработка планировочного решения объекта на основании технического задания, составленного Заказчиком</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 mt-4 mb-5">
                        <div class="h-50">
                            <img style="height: auto; width: 100%;" src="{{asset('storage/image_site/other/2.png')}}" alt="">
                        </div>
                        <div class="h-50">
                            <p>Включает в себя: Разработка рабочих чертежей.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 mt-4 mb-5">
                        <div class="h-50">
                            <img style="height: auto; width: 100%;" src="{{asset('storage/image_site/other/3.png')}}" alt="">
                        </div>
                        <div class="h-50">
                            <span>Включает в себя:</span>
                            <ul class="pl-3">
                                <li>Разработка эскизной части - изготовление цветных 3D эскизов объекта</li>
                                <li>3-д визуализация каждого помещения в разных ракурсах;</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 mt-4 mb-5">
                        <div class="h-50">
                            <img style="height: auto; width: 100%;" src="{{asset('storage/image_site/other/4.png')}}" alt="">
                        </div>
                        <div class="h-50">
                            <span>Включает в себя:</span>
                            <ul class="pl-3">
                                <li>Разработка эскизной части - изготовление цветных 3D эскизов объекта каждого помещения в разных ракурсах, с использованием подобранных материалов
                                    и оборудования;</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 mt-4 mb-5" style="width: 20%;" class="">
                        <div class="h-50">
                            <img style="height: auto; width: 100%;" src="{{asset('storage/image_site/other/5.png')}}" alt="">
                        </div>
                        <div class="h-50">
                            <p>Этап №1. -Разработка планировочного решения объекта на основании технического задания.
                                Этап №2: Разработка эскизной части - изготовление цветных
                                3D эскизов
                                Этап №3: Разработка рабочих чертежей.</p>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row justify-content-around align-items-center m-5">
            <div class="col-lg-4 d-lg-block d-sm-none" style="height: 2px; background-color:#fff;"></div>
            <a class="col-xs-6 col-lg-2 rounded-pill btn btn-primary" href="https://yadi.sk/i/Fy-niKCOB7QPgA" target="_blank">СКАЧАТЬ</a>
            <div class="col-lg-4 d-lg-block d-sm-none" style="height: 2px; background-color:#fff;"></div>
    </div>
        </div>
@endsection
