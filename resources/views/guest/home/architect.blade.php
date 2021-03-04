@extends('layouts.guestLayout')
@section('content')
    <main>
        <section id="arch-header" class="text-center">
            <div class="arch-header-container col-12 row">
                <div class="col-8 m-auto">
                    <h1>АРХИТЕКТУРНОЕ ПРОЕКТИРОВАНИЕ ВАШЕГО ДОМА</h1>
                    <p>Как будет выглядеть ваш дом? Какие материалы на фасаде, как расположены комнаты и где размещены подсобные
                        помещения. На эти и другие строительные вопросы отвечает архитектурный проект.</p>
                    <p>Суть эскизного проекта заключается в комплексной проработке всех аспектов будущего объекта строительства.
                        Именно на этой стадии проектирования заказчик принимает принципиальные объемно-планировочные и
                        архитектурные решения.</p>
                </div>

                <div class="col-12 row m-auto justify-content-around align-items-baseline">
                    <div class="lineForButton col-4 "></div>
                    <a class="btn col-2" href="">КАК?</a>
                    <div class="lineForButton col-4"></div>
                </div>
                <div class="col-12 row m-auto justify-content-center">
                    <span class="col-3">Как объяснить проектировщику, какой дом вы хотите?</span>
                </div>
                <div class="col-7 m-auto">
                    <p>ЗАКАЗЫВАЯ ПРОЕКТ ЖИЛОГО ДОМА В CONCEPT INTERIORS ВЫ ПОЛУЧАЕТЕ:</p>
                </div>
            </div>
        </section>
        <section id="arch-content">
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>Визуализация объекта</h1>
                    <p>Визуализации представляют собой 3d-изображения дома с всех ракурсов, которые необходимы для максимальной наглядности и информативности проекта. Вы сможете увидеть будущий дом во всех деталях, включая реальные облицовочные материалы и прилегающую территорию.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-4">
                        <img src="{{asset('storage/image_site/other/visual-1.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img src="{{asset('storage/image_site/other/visual-2.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img src="{{asset('storage/image_site/other/visual-3.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>Схема посадки здания на участок </h1>
                    <p>На основании топографического плана и замеров участка строительства составляется схема посадки с привязкой по местности, на котором в том числе отображаются здание, его размеры, отступы от границ участка.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/sheme-1.jpg')}}" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/sheme-2.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>План благоустройства</h1>
                    <p>На плане благоустройства участка, где обозначены пешеходные зоны, парковки, зеленые зоны, малые архитектурные формы и дополнительные постройки (баня, бассейн, гараж..).</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-12">
                        <img src="{{asset('storage/image_site/other/plan-1.jpg')}}" alt="">
                    </div>
                    \                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>3d-сечения</h1>
                    <p>Для информативного представления будущего дома необходимо видеть его и в сечениях. Для этого используются так называемые «разрезы». 3d-сечения позволяют увидеть поэтажно конфигурации всех помещений, представить пропорции, сопоставить размеры комнат и мебели.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/3d-1.jpg')}}" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/3d-2.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>План расстановки мебели и оборудования</h1>
                    <p>Подробные экспликации содержат планы расстановки мебели и дополнительного оборудования, жилых комнат и тех помещений. Составляются на каждый этаж.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-12">
                        <img src="{{asset('storage/image_site/other/land-plain-1.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>Развертки и планы всех элементов конструктива здания</h1>
                    <p>Большая часть проекта — это схемы плит перекрытий, кровли, фундамента, лестниц, внешних стен, внутренних перегородок и других частей дома, которые необходимы для точного выполнения этапа строительства и калькуляции. Схемы содержат описания материалов, вентканалов, ведомостей проемов, размеров, высот, осей, узлов соединений и других элементов дома.Подробные экспликации содержат планы расстановки мебели и дополнительного оборудования, жилых комнат и тех помещений. Составляются на каждый этаж.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/plan-build-1.jpg')}}" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/plan-build-2.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>Описание индивидуальных решений</h1>
                    <p>Все дополнительные элементы, такие как камины, бассейны, террасы, гаражи, тоже требуют детального описания.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/description-1.jpg')}}" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/description-2.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>Схема фасадов</h1>
                    <p>Помимо 3d-визуализации, проект содержит детальные схемы отделки фасадов: размеры, материалы, оси и т.п.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-12">
                        <img src="{{asset('storage/image_site/other/sheme-facades-1.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>3d-визуализация конструктива</h1>
                    <p>Разрез здания с точки зрения несущих конструкций. На этой визуализации видны все элементы конструктива дома: балки, перекрытия, фермы, вентканалы и др.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/3d-const-1.jpg')}}" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{asset('storage/image_site/other/3d-const-2.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>Сопутствующая документация</h1>
                    <p>Безусловно, архитектурный проект Concept Interiors содержит всю необходимую информацию для дальнейшей стадии строительства. Архитектурный проект передается заказчику в трех экземплярах для работы с подрядчиками.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-4">
                        <img src="{{asset('storage/image_site/other/visual-1.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img src="{{asset('storage/image_site/other/visual-2.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img src="{{asset('storage/image_site/other/visual-3.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="row justify-content-center">
                <div class="col-9 text-center">
                    <h1>Визуализация объекта</h1>
                    <p>Визуализации представляют собой 3d-изображения дома с всех ракурсов, которые необходимы для максимальной наглядности и информативности проекта. Вы сможете увидеть будущий дом во всех деталях, включая реальные облицовочные материалы и прилегающую территорию.</p>
                </div>
                <div class="col-9 row justify-content-around arch-images-container">
                    <div class="col-4">
                        <img src="{{asset('storage/image_site/other/visual-1.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img src="{{asset('storage/image_site/other/visual-2.jpg')}}" alt="">
                    </div>
                    <div class="col-4">
                        <img src="{{asset('storage/image_site/other/visual-3.jpg')}}" alt="">
                    </div>
                </div>
            </section>
            <section class="mb-5 row justify-content-center">
                <div class="col-9 text-center ">
                    <h1>Сопутствующая документация</h1>
                    <p>Безусловно, архитектурный проект Concept Interiors содержит всю необходимую информацию для дальнейшей стадии строительства. Архитектурный проект передается заказчику в трех экземплярах для работы с подрядчиками.</p>
                </div>
            </section>
        </section>

        <section id="arch-footer" class="text-center m-auto row justify-content-center">

            <div class="arch-footer-container col-9 row">
                <section class="col-12 m-auto">
                    <h1>ЭТАПЫ И ПРОЦЕССЫ</h1>
                </section>
                <section class="col-12 m-auto row justify-content-center align-items-baseline">
                    <div class="col-4 lineForButton"></div>
                    <a class="btn col-2" href="">ЖМИ</a>
                    <div class="col-4 lineForButton"></div>
                </section>
            </div>
        </section>
    </main>
@endsection
