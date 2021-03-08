@extends('layouts.guestLayout')
@section('content')
    <div class="container">
        <div id="stages-container" class="row justify-content-center">
            <div class="col-12 row mb-5 mt-5">
                <h1 class="d-block col-6">ЭТАПЫ И ПРОЦЕССЫ</h1>
                <div class="col-12 row">
                    <img class="float-left col-4" src="{{asset('storage/image_site/other/proc-1.jpg')}}" alt="">
                    <div class="col-8">
                        <p>Перед тем, как обратиться в архитектурное бюро, вы уже наверняка представили свой будущий дом. Может быть видели что-то похожее, сохранили фотографию или просто знаете желания всех членов своей семьи. Так это или нет, начинать наше сотрудничество мы будем с задушевного, но профессионального разговора. Наша задача на этом этапе – понять, каким вы хотите видеть свой дом. На основании ваших представлений мы предложим несколько вариантов и детально проработаем один из них. Где бы вы ни заказывали проект, предлагаем вам ознакомиться со списком вопросов, которые помогут оформить ваши желания в понятный всем сторонам процесса образ. Проверьте себя по этому чек-листу и продолжайте изучать предложения рынка. Вот увидите, искать оптимальный вариант станет проще.</p>
                        <a class="btn" href="">ЧЕК ЛИСТ</a>
                    </div>
                </div>
            </div>
            <div class="col-12 row mb-5 mt-5 justify-content-around">
                <img class="col-4" src="{{asset('storage/image_site/other/proc-2.jpg')}}" alt="">
                <img class="col-4" src="{{asset('storage/image_site/other/proc-3.jpg')}}" alt="">
                <img class="col-4" src="{{asset('storage/image_site/other/proc-4.jpeg')}}" alt="">
            </div>
        </div>
    </div>
@endsection
