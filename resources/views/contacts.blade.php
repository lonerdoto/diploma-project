@extends('layouts.layout', ['title' => 'Контакты'])
@section('content')
    @include('components.scripts.get-role')


    <div class="gap-5 gradient mx-auto py-5 px-10 text-white">
        <h1 class="mt-10 text-4xl font-normal">Контакты</h1>
        <div class="flex py-10 gap-7 rounded-xl">
            <div class="flex flex-col gap-10">
                <div class="flex flex-col gap-5">
                    <p class="text-2xl font-bold w-full">Московский офис:</p>
                    <p class="text-xl">115201, Москва, Каширское шоссе, д. 22, корп. 4, стр.7</p>
                </div>
                <div class="flex flex-col gap-5">
                    <p class="text-2xl font-bold w-full">Коммерческий офис:</p>
                    <p class="text-xl">141345, Московская область, Сергиево-Посадский муниципальный район, сельское поселение
                        Березняковское, пос. Беликово, д. 11</p>
                </div>
                <div class="flex flex-col gap-2">
                    <a class="underline text-xl" href="tel:+74952311512">+7 (495) 231-15-12</a>
                    <a class="underline text-xl" href="mailto:info@sotex.ru">info@sotex.ru</a>
                </div>
            </div>
            <div class="flex-grow"></div>
            <div class="flex flex-col gap-10 max-w-screen-sm bg-gray-100 rounded-xl p-7 first-color">
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl">Схема проезда в Московский офис ЗАО «ФармФирма «Сотекс»</h2>
                    <a href="{{asset('images/map3.png')}}" data-lightbox="image-gallery" data-title="Your Image Title 1">
                        <img class="hover:scale-105 transition duration-300 rounded-2xl shadow-2xl" src="{{asset('images/map3.png')}}" alt="Image 1">
                    </a>
                    <p class="text-xl">115201, Москва, Каширское шоссе, д. 22, корп. 4, стр.7</p>
                </div>
                <div class="flex flex-col gap-5">
                    <h2 class="text-xl">Схема проезда в коммерческий офис ЗАО «ФармФирма «Сотекс»</h2>
                    <a href="{{asset('images/map2.png')}}" data-lightbox="image-gallery" data-title="Your Image Title 1">
                        <img class="hover:scale-105 transition duration-300 rounded-2xl shadow-2xl" src="{{asset('images/map2.png')}}" alt="Image 1">
                    </a>
                    <p class="text-xl">141345, Московская область, Сергиево-Посадский муниципальный район, сельское поселение
                        Березняковское, пос. Беликово, д. 11</p>
                </div>
            </div>
        </div>
    </div>
@endsection
