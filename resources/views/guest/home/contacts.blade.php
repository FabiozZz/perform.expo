@extends('layouts.guestLayout')
@section('content')
    <div class="container-fluid" id="container-contacts">
        <div class="row" id="contacts-header">
            <p class="col-7 text-center m-auto">Для защиты нашей интеллектуальной собственности
                мы просим оставить вас свой номер телефона и имя.
                В дальнейшем менеджер Concept Interiors сможет связаться
                с вами, чтобы выслать примеры наших работ и предложение
                по стоимости проекта.</p>
        </div>
        <div class="row mt-5 mb-5">
            <div id="contacts-form" class="m-auto text-center">
                <h1>CONCEPT INTERIORS</h1>
                <p>Как объяснить проектировщику, какой дом вы хотите?</p>
                <form action="" class="row justify-content-center flex-column m-auto" id="contactsForm">
                    <input class="d-block " placeholder="Имя" id="contactsName" type="text">
                    <input class="d-block " placeholder="Телефон" id="contactsEmail" type="email">
                    <button class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
        <div id="contacts-private" class="row justify-content-center pt-5 pb-5 text-center">
            <div class="col-8 ">
                <h2 class="col-12 mb-4">С ПОЛИТИКОЙ КОНФИДЕНЦИАЛЬНОСТИ ОЗНАКОМЛЕН</h2>
                <button class="btn mb-5">Ознакомится</button>
                <h1 class="col-12 mb-4">Как дальше строится работа
                    архитектурного бюро и заказчика? <br>
                    Посмотрим все этапы:</h1>
                <ol class="col-12">
                    <li>Встреча с клиентом, составление ТЗ. </li>
                    <li>Выезд на объект/участок застройки. </li>
                    <li>Замеры территории. </li>
                    <li>Топографическая съемка. </li>
                    <li>Разработка поэтажных планов и посадки дома, определения основных элементов прилегающей территории. </li>
                    <li>Подбор материалов фасада и 3d-визуализация. </li>
                    <li>Внесение необходимых корректировок. </li>
                    <li>Утверждение 3d-эскиза. </li>
                    <li>Разработка технической и рабочей документации. </li>
                </ol>
            </div>
        </div>
        <div id="contacts-footer" class="row text-center justify-content-center">
            <div class="col-7 text-center m-auto">
                <p>Итогом работы станет архитектурный проект. Это несколько экземпляров альбома чертежей, которые включают в себя всю исчерпывающую информацию о будущем здании, необходимую для расчетов инженерной части и строительства. </p>
            </div>
        </div>
    </div>
@endsection
